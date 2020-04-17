<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'required',
            'code'                  => 'required',
            'full_name'             => 'required',
            'phone'                 => 'required',
            'transport'             => 'required',
            'location'              => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'                         => 'Tên sản phẩm ký gửi không được để trống',
            'code.required'                         => 'Mã vận đơn ký gửi không được để trống',
            'full_name.required'                    => 'Tên khách hàng ký gửi không được để trống',
            'phone.required'                        => 'Số điện thoại của khách hàng ký gửi không được để trống',
            'transport.required'                    => 'Loại vận chuyển không được để trống',
            'location.required'                     => 'Loại vận chuyển không được để trống',
        ];
    }
}
