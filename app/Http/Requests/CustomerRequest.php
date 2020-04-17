<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'required|min:3|max:50',
            'email'                 => 'required|email|unique:customer',
            'password'              => 'required|confirmed|min:6',
            'phone'             => 'required',
            'agreeterm'             => 'required',
            'password_confirmation' => 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'name.required'                     => 'Tên người dùng không được để trống',
            'phone.required'                    => 'Số điện thoại không được để trống',
            'name.min'                          => 'Tên người dùng quá ngắn',
            'name.max'                          => 'Tên người dùng quá dài',
            'email.required'                    => 'Email để khôi phục mật khẩu không được để trống',
            'email.email'                       => 'Định đạng email không chính xác',
            'email.unique'                      => 'Email này đã có người sử dụng.',
            'password.required'                 => 'Mật khẩu không được để trống',
            'password.confirmed'                => 'Mật khẩu không trùng khớp',
            'password_confirmation.required'    => 'Mật khẩu nhập lại không được để trống',
            'password_confirmation.min'         => 'Mật khẩu nhập lại quá ngắn',
            'agreeterm.required'                => 'Chấp nhận các điều khoản của chúng tôi',
        ];
    }
}
