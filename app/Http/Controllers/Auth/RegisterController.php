<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ],[
             'name.required'  => 'กรุณากรอกชื่อด้วย',
             'name.max'  => 'ตั้งชือไม่เกิน 255 ตัวอักษร',
             'email.required'  => 'กรุณากรอกอีเมลด้วย',
             'email.max'  => 'กรุณากรอกอีเมลไม่เกิน 255 ตัวอักษร',
             'password.required'  => 'กรุณากรอกพาสเวิร์สด้วย',
             'email.email'  => 'กรอกรูปเเบบอีเมลไม่ถูกต้อง',
             'email.unique'  => 'อีเมลนี้ถูกลงทะเบียนไปเเล้ว',
             'password.confirmed'  => 'ยืนยันพาสเวิร์สไม่ตรงกัน',
             'password.min'  => 'พาสเวิร์สขั้นตำ 6 ตัวขึ้นไป',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) //เพิ่มข้อมูลลลงในฐานข้อมูล
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);


    }
}
