<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name'     => 'required',
            'number_phone'  => 'required',
            'messages'      => 'required'
        ];
    }
    public function messages()
    {
        return [
            'full_name.required'        => 'Họ và tên không được trống',
            'number_phone.required'     => 'Số điện thoại không được trống',
            'messages.required'         => 'Lời nhắn không được trống',
        ];
    }
}
