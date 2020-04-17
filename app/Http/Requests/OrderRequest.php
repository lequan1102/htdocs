<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'required',
            'link'                  => 'required',
            'qty'                   => 'required',
            'money'                 => 'required',
            'transport'             => 'required',
            'location'              => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Tên người dùng không được để trống',
            'link.required'         => 'Liên kết sản phẩm không được để trống',
            'qty.required'          => 'Số lượng không được để trống',
            'money.required'        => 'Số tiền không được để trống',
            'transport.required'    => 'Vận chuyển không được để trống',
            'location.required'     => 'Vị trí không được để trống',
        ];
    }
}
