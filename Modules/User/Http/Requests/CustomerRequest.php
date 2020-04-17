<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{

     public function rules()
     {
         return [
             'email'     => 'required|email',
             'password'  => 'required|min:6'
         ];
     }
     public function messages()
 	  {
   		return [
   			'email.required'        => 'Địa chỉ email không được để trống',
   			'email.email'           => 'Định dạng email không chính xác',
   			'password.required'     => 'Mật khẩu không được để trống',
   			'password.min'          => 'Mật khẩu quá ngắn',
   		];
     }
}
