<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerChangeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current-password'          => 'required',
            'password'                  => 'min:6|required|same:password',
            'password_confirmation'     => 'required|same:password'
        ];
    }
    public function messages()
	  {
  		return [
            'current-password.required'             => 'Mật khẩu hiện tại đang trống',
            'password.required'                     => 'Mật khẩu mới hiện tại đang trống',
            'password.min'                          => 'Mật khẩu mới quá ngắn',
            'password_confirmation.required'        => 'Nhâp lại mật khẩu mới hiện tại đang trống',
            'password_confirmation.same'            => 'Xác nhận mật khẩu và mật khẩu phải khớp.'
  		];
    }
}
