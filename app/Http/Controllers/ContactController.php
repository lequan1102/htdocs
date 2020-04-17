<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use DateTime;
class ContactController extends Controller
{
    public function contact(ContactRequest $request)
    {
        if ($request->isMethod('post')) {
            \DB::beginTransaction();
            $data = array(
                'full_name'         =>  $request->full_name,
                'number_phone'      =>  $request->number_phone,
                'messages'          =>  $request->messages,
                'created_at'        =>  new \DateTime(),
            );
            if (Contact::create($data)){
                \DB::commit();
                return redirect()->route('home')->with('success', 'Gửi liên hệ thành công! Chúng tôi sẽ sớm liên hệ với bạn');
            } else {
                \DB::rollBack();
                return redirect()->route('home')->with('error', 'Đã có lỗi sảy ra, Đăng bài không thành công!');
            }
        }
    }
    public function course(Request $request){

        if ($request->ajax()){
            if ($request->c_name != '' && $request->c_phone != '' && $request->c_location != ''){
                $result = '';
                $messages = '';
                $data = array(
                    'full_name'     => $request->c_name,
                    'number_phone'  => $request->c_phone,
                    'location'      => $request->c_location,
                    'code_discount' => $request->c_code_discount,
                    'created_at'    => new \DateTime(),
                    'course'        => 'Khóa học'
                );
                if (Contact::create($data)){
                    \DB::commit();
                    $result = 1;
                    $messages = 'Gửi thành công khoá học! Chúng tôi sẽ liên hệ sớm nhất với bạn';
                } else {
                    \DB::rollBack();
                    $result = 2;
                    $messages = 'Đã có lỗi xảy ra khi gửi thông tin khóa học';
                }
            } else {
                $result = 3;
                $messages = 'Vui lòng điền đầy đủ thông tin liên hệ để chúng tôi giúp bạn';
            }
            return response()->json([
                'result' => $result,
                'messages' => $messages,
            ]);
        }

    }
    //Ajax chuyển tiền trung quốc trang đơn
    public function services_cny(Request $request){
        if ($request->ajax()){
            $tygia = (int)$request->tygia;
            $cny = (int)$request->cny;
            $result = $tygia * $cny;
            echo number_format($result, 2, ',', ' ');
        }
    }
    public function services_vnd(Request $request){
        if ($request->ajax()){
            $tygia = (int)$request->tygia;
            $vnd = $request->vnd;
            $vnd = str_replace('.', '',$vnd);
            $result = $vnd/$tygia;
            echo number_format($result, 2, ',', ' ');
        }
    }
}
