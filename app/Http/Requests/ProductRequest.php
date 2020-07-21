<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'picture' => 'image|mimes:jpeg,jpg,png',
            // 'avatar' => 'dimensions:min_width=100,min_height=200'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชื่อสินค้า',
            'price.required' => 'กรุณากรอกราคา',
            'price.numeric' => 'กรุณากรอกตัวเลขเท่านั้น',
            'category_id.required' => 'กรุณาเลือกประเภทสินค้า',
            'picture.image' => 'กรุณาเลือกไฟล์ที่เป็นรูปภภาพเท่านั้น',
            'picture.image' => 'กรุณาเลือกไฟล์นามสุกุล jpeg,jpg,png'
        ];
    }

  
}
