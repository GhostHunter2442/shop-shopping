<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class AddressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'adress1' => 'required',
            'adress2' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'กรุณากรอกชื่อ',
            'lastname.required' => 'กรุณาณากรอกนามสกุล',
            'email.required' => 'กรุณากรอกตัวเลขเท่านั้น',
            'phonenumber.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'adress1.required' => 'กรุณาเลือกที่อยู่',
            'adress2.required' => 'กรุณาเลือกบ้านเลขที่'
        ];
    }
}
