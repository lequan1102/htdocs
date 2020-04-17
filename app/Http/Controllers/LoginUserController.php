<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerSigninRequest;
use App\Http\Requests\CustomerChangeRequest;
use App\Customer;


class LoginUserController extends Controller
{
    /**
     * Hiển thị view login quản trị
     */
     public function __construct()
     {
         //Không hoạt động -- Ai giải thích giùm cái (kiểm tra đều null khi đăng nhập với chưa đăng nhập)
         if (Auth::guard('customer') && Auth::guard('customer')->check()) {
             // The adminstration is logged in...
             return redirect()->route('index.user');
         } else {
             return redirect()->route('login');
         }
     }
    /**
     * Authenlicate
     * 1. GET Đăng ký thành viên
     * 2. POST Tạo mới thành viên
     * 3. GET Đăng nhập thành viên
     * 4. POST Kiểm tra đăng nhập
     */
    //Giao diện đăng ký
    public function signup()
    {
        return view('loginUser.signup');
    }
    // Giao diện đăng nhập
    public function signin()
    {
        if (Auth::guard('customer') && Auth::guard('customer')->check()) {
            // The adminstration is logged in...
            return redirect()->route('index.user');
        } else {
            return view('loginUser.signin');
        }
    }
    // tạo mới customer
    public function signup_submit(CustomerRequest $request)
    {
        if ($request->isMethod('post')) {
            try {
                \DB::beginTransaction();
                $data = array(
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'phone'         => $request->phone,
                    'password'      => Hash::make($request->password),
                    'created_at'    => new \DateTime(),
                );
                $customer_create = Customer::create($data);
                if ($customer_create){
                    \DB::commit();
                    return redirect()->route('customer.index')->with('success', 'Nó đã làm việc, Tạo mới quản trị thành công!');
                }
            } catch (\Exception $e) {
                \DB::rollBack();
                return redirect()->route('customer.signup')->with('error', 'Đã có lỗi sảy ra, Tạo mới khách hàng không thành công!');
            }
        }
    }
    // Kiểm tra đăng nhập
    public function login_submit(CustomerSigninRequest $request)
    {
        // $credentials = $request->only('email', 'password');
        $email      = $request->input('email');
        $password   = $request->input('password');
        $remember   = $request->input('remember_token');
        if(Auth::guard('customer')->attempt(['email' => $email, 'password' => $password], $remember)){
            return redirect()->route('index.user')->with('success', 'Chào mừng bạn quay trở lại!');
        }
        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->with('error', 'Đăng nhập thất bại!');
    }
    //Thay đổi mật khẩu
    public function reset_password()
    {
        return view('loginUser.app.resetpassword');
    }
    public function reset_password_post(CustomerChangeRequest $request)
    {
        if ($request->isMethod('post')) {
            if(Auth::guard('customer')->check()){
                $pass = Hash::make($request->input('current-password'));
                if (Auth::guard('customer')->check() == $pass){
                    try {
                        \DB::beginTransaction();
                        $data = array(
                            'password'          => Hash::make($request->input('password')),
                        );
                        $customer_reset_password = Customer::find(Auth::guard('customer')->user()->id);
                        if ($customer_reset_password->update($data)){
                            \DB::commit();
                            return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công!');
                        }
                    } catch (\Exception $e) {
                        \DB::rollBack();
                        return redirect()->back()->with('error', 'Đã có lỗi sảy ra, Thay đổi mật khẩu không thành công!');
                    }
                } else {
                    return redirect()->back()->with('error','Mật khẩu hiện tại không trùng khớp');
                }
            }
        }
    }
    /**
     * Method $_POST Login
     * Forgot Password administration
     * Send Email with link reset password new
     * Expires Email in 5 minute
     */
    public function forgot_password()
    {

    }
    //Cập nhật thông tin khách hàng
    // public function update(Request $request, $id)
    // {
    //     $id = (int)$id;
    //     if ($request->isMethod('post')) {
    //         if (is_numeric($id) && Customer::find($id)) {
    //             $customer_update = Customer::find($id);
    //             \DB::beginTransaction();
    //             $data = array(
    //                 'name'          => $request->name,
    //                 'avatar'        => $request->avatar,
    //                 'background'    => $request->background,
    //                 'status'        => $request->status,
    //                 'updated_at'    => new DateTime(),
    //             );
    //             if ($customer_update->update($data)){
    //                 \DB::commit();
    //                 return redirect()->route('index.admin')->with('success', 'Làm việc, Cập nhập thành công!');
    //             } else {
    //                 \DB::rollBack();
    //                 return redirect()->route('index.admin')->with('error', 'Đã có lỗi sảy ra, Cập nhập thông tin không thành công!');
    //             }
    //         } else {
    //             return redirect()->route('index.admin')->with('error','đang cố cập nhật '. $id .' không tồn tại dữ liệu');
    //         }
    //     }
    // }
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('login');
    }
}
