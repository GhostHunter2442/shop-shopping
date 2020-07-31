<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'adress' => 'required',
            'phonenumber' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชื่อเวป',
            'email.required' => 'กรุณากรอกเมล',
            'email.email' => 'กรุณากรอรูปเเบบให้ถูกต้อง',
            'adress.email' => 'กรุณากรอกที่อยู่',
            'phonenumber.required' => 'กรุณากรอกเบอร์โทร',
            'open_time.required' => 'กรุณากรอกเวลาเปิด',
            'close_time.required' => 'กรุณากรอกเวลาปิด',
        ];
    }
}
