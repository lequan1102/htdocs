<?php

namespace App\Http\Controllers;

use App\Settings;
use App\Products;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['products'] = Products::orderBy('id','DESC')->limit(50)->get();
        return view('home', $data);
    }
    //Sản phẩm
    public function cate_product()
    {
        $data['cate'] = Products::orderBy('id','DESC')->where('status', 'PUBLISHED')->paginate(12);
        return view('category.products', $data);
    }
    public function article_product($slug)
    {
        $data['article'] = Products::where('slug', $slug)->first();
        $data['related'] = Products::where('slug','<>',$slug)->limit(10)->get();
        return view('article.products', $data);
    }
    /*
     * Tìm kiếm
     * serach_waybill       $GET   | tìm kiếm mã vận đơn trang chủ
     * serach_customer      $POST  | tìm kiếm mã vận đơn trong quản trị khách hàng
     * waybill_code         $GET   | link người Trung quốc có thể nhập mã vận đơn
     * waybill_code_post    $POST  | link người Trung quốc có thể nhập mã vận đơn và thêm kho hoặc cập nhật kho
     */
    public function serach_waybill(Request $request)
    {
        $data['key_search'] = $key_search = $request->input('key_search');
        $data['result'] = Transport::where('code', $key_search)->first();
        return view('customer.app.search',$data);
    }

    public function waybill_code()
    {
        return view('customer.app.search_waybill_code');
    }
    public function waybill_code_post(Request $request)
    {
        if ($request->isMethod('post')) {
            // cố gắng tìm kiếm mã vận đơn trong csdl
            if (Transport::where('code',$request->input('code'))->first()){
                try {
                    \DB::beginTransaction();
                    $data = array(
                        'kg'        => $request->input('kg'),
                        'status'    => 'Đã nhận tại Trung Quốc'
                    );
                    if (Transport::where('code',$request->input('code'))->update($data)) {
                        \DB::commit();
                        return redirect()->back()->with('success', __('bluid.capnhatvandonthanhcong'));
                    }
                } catch (\Exception $e) {
                    \DB::rollback();
                    return redirect()->back()->with('error',__('bluid.dacoloixayra'));
                }
            } else {
                //nếu không tìm thấy mã vận đơn trong csdl tạo mới mã vận đơn
                try {
                    \DB::beginTransaction();
                    $data = array(
                        'code'      => $request->input('code'),
                        'kg'        => $request->input('kg'),
                        'status'    => 'Đã nhận tại Trung Quốc'
                    );
                    if (Transport::create($data)) {
                        \DB::commit();
                        return redirect()->back()->with('success', __('bluid.themvandonthanhcong'));
                    }
                } catch (\Exception $e) {
                    \DB::rollback();
                    return redirect()->back()->with('error',__('bluid.dacoloixayra'));
                }
            }
        }
    }

    /*
     * Cập nhật tỷ giá bên ngoài
     * tygia                $GET  |  Hiển thị view
     * update_tygia         $POST |  Cập nhật tỷ giá
     */
}
