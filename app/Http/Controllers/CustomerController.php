<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\Transport;
use App\Tutorial;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\TransportRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function __construct(){
        parent::__construct();
    }
    /*
     * Về tôi, thông tin cá nhân
     * ::view chỉnh sửa
     * ::update
     */
    public function aboutme($id)
    {
        $data['aboutme'] = Customer::find($id);
        return view('customer.app.aboutme', $data);
    }
    public function aboutme_post(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                \DB::beginTransaction();

                $cover = $request->file('avatar');
                $name = Auth::guard('customer')->user()->avatar;
                if ($cover == null){
                    $cover = $name;
                } else {
                    $cover = $cover->getClientSize().$cover->getClientOriginalName();
                    $exists = Storage::disk('uploads_image')->exists($name);
                    if($exists == 1){
                        Storage::disk('uploads_image')->delete($name);
                    }
                    Storage::disk('uploads_image')->put($cover,  File::get($request->file('avatar')));

                }

                $data = array(
                    'name'              => $request->input('name'),
                    'avatar'            => $cover,
                    'gender'            => $request->input('gender'),
                    'date'              => $request->input('date'),
                    'city'              => $request->input('city'),
                    'location'          => $request->input('location'),
                );

                $customer_aboutme = Customer::find(Auth::guard('customer')->user()->id);
                if ($customer_aboutme->update($data)){
                    \DB::commit();
                    return redirect()->back()->with('success', 'Thay đổi thông tin thành công!');
                }
            } catch (\Exception $e) {
                \DB::rollBack();
                return redirect()->back()->with('error', 'Đã có lỗi sảy ra, Thay đổi thông tin không thành công!');
            }
        }
    }
    /*
     * Đơn hàng
     * ::view tất cả
     * ::view tạo mới
     * ::create
     */
    public function order()
    {
        $data['order'] = Order::orderBy('id','DESC')->where('customer_id', Auth::guard('customer')->user()->id)->paginate(9);
        return view('customer.app.order', $data);
    }
    public function create_order(){
        if (Auth::guard('customer') && Auth::guard('customer')->check()) {
            return view('customer.app.create_order');
        } else {
            return redirect()->route('customer.signin');
        }

    }
    public function create_order_post(OrderRequest $request){
        if($request->isMethod('post')){
            //Đóng gỗ
            if($request->box == ''){
                $result = $request->box = 'null';
            } else {
                $result = str_replace('.', ',', implode(' ',$request->input('box')) );
            }
            //hình ảnh đơn hàng
            $image = $request->file('image');

            $image = $image->getClientSize().$image->getClientOriginalName();
            Storage::disk('uploads_image')->put($image,  File::get($request->file('image')));

            try {
                \DB::beginTransaction();
                $data = array(
                    'name'          => $request->input('name'),
                    'link'          => $request->input('link'),
                    'image'         => $image,
                    'note'          => $request->input('note'),
                    'qty'           => $request->input('qty'),
                    'location'      => $request->input('location'),
                    'kg'            => $request->input('kg'),
                    'box'           => $result,
                    'status'        => 'Đang cập nhật',
                    'money'         => $request->input('money'),
                    'transport'     => $request->input('transport'),
                    'customer_name' => Auth::guard('customer')->user()->name,
                    'customer_id'   => Auth::guard('customer')->user()->id,
                    'created_at'    => new \DateTime()
                );
                if(Order::create($data)){
                    \DB::commit();
                    return redirect()->route('customer.create.order')->with('success', 'Tạo đơn hàng thành công!');
                }
            } catch (\Exception $e) {
                \DB::rollback();
                return redirect()->back()->with('error', 'Tạo đơn hàng không thành công!');
            }
        }
    }
    /*
     * Ký gửi vận chuyển
     * ::view tất cả
     * ::view tạo mới
     * ::create
     */
    public function transport()
    {
        $data['transport'] = Transport::orderBy('id','DESC')->where('customer_id', Auth::guard('customer')->user()->id)->paginate(9);
        return view('customer.app.transport', $data);
    }
    public function create_transport(){
        if (Auth::guard('customer') && Auth::guard('customer')->check()) {
            return view('customer.app.create_transport');
        } else {
            return redirect()->route('customer.signin');
        }
    }
    public function create_transport_post(TransportRequest $request){
        if($request->isMethod('post')){
            //Đóng gỗ
            if($request->box == ''){
                $result = $request->box = 'null';
            } else {
                $result = str_replace('.', ',', implode(' ',$request->input('box')) );
            }
            try {
                \DB::beginTransaction();
                $data = array(
                    'name'          => $request->input('name'),
                    'code'          => $request->input('code'),
                    'full_name'     => $request->input('full_name'),
                    'phone'         => $request->input('phone'),
                    'location'      => $request->input('location'),
                    'transport'     => $request->input('transport'),
                    'box'           => $result,
                    'status'        => 'Đang cập nhật',
                    'note'          => $request->input('note'),
                    'customer_name' => Auth::guard('customer')->user()->name,
                    'customer_id'   => Auth::guard('customer')->user()->id,
                );
                if(Transport::create($data)){
                    \DB::commit();
                    return redirect()->route('customer.create.transport')->with('success', 'Tạo mã vận đơn thành công!');
                }
            } catch (\Exception $e) {
                \DB::rollback();
                return redirect()->back()->with('error', 'Tạo mã vận đơn không thành công!');
            }
        }
    }
    //Hướng dẫn
    public function tutorial($slug)
    {
        $data['tutorial_detail'] = Tutorial::where('slug', $slug)->first();
        return view('customer.app.tutorial', $data);
    }
    //Tìm kiếm mã vân đơn & đơn hàng
    public function search(Request $request)
    {
        $key_search = $data['key_search'] = $request->input('key_search');
        //$data['result'] = Transport::where('name','LIKE','%'.$key_search.'%')
    //->Where('customer_id',Auth::guard('customer')->user()->id)
    //->orWhere('code','LIKE','%'.$key_search.'%')
    //->orderBy('id', 'desc')
    //->paginate(9);
        $data['result'] = Order::where('name','LIKE','%'.$key_search.'%')
            ->Where('customer_id',Auth::guard('customer')->user()->id)
            ->orWhere('code','LIKE','%'.$key_search.'%')
            ->orderBy('id', 'desc')
            ->paginate(9);
        return view('customer.app.search', $data);
    }
    //tìm kiếm vã vận đơn
    public function waybill_customer(Request $request)
    {
        $data['key_search'] = $key_search = $request->input('key_search');
        $data['result'] = Transport::where('code', $key_search)->first();
        return view('customer.app.waybill_customer',$data);
    }
}
