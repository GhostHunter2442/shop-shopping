<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MatchOldPassword;
class PasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'currentpassword' => ['required', new MatchOldPassword],
            'newpassword' => 'required|different:currentpassword|min:6',
            'comfirmpassword' => 'required|same:newpassword|min:6',
        ];
    }

    public function messages()
    {
        return [
             'currentpassword.required' => 'กรุณากรอกรหัสผ่านเดิม',
             'newpassword.required' => 'กรุณาณากรอกรหัสผ่านใหม่',
             'newpassword.min' => 'กรุณาณากรอกรหัส 6 ตัวอักษรขึ้นไป',
             'newpassword.different' => 'รหัสผ่านนี่ถูกใช้งานเเล้ว',
             'comfirmpassword.required' => 'กรุณากรอกยืนยันรหัสผ่านใหม่',
             'comfirmpassword.min' => 'กรุณาณากรอกรหัส 6 ตัวอักษรขึ้นไป',
             'comfirmpassword.same' => 'รหัสผ่านไม่ตรงกัน',
        ];
    }
}
