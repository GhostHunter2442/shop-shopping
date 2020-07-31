<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use App\General;
class ContactController extends Controller
{
   public function index(){

    $email= 'dataghosthunter@gmail.com';
    $phone= '081-9999XX1';
    // $count_cart =  Cart::where('user_id',auth()->user()->id)->sum('qty');
       $data_general =General::all();
       $fram='<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1976.0839159572015!2d98.38613493512825!3d7.877501477344947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305031fd229b639f%3A0x4dbb886cda5a3ed!2s7-Eleven!5e0!3m2!1sen!2sth!4v1596196405316!5m2!1sen!2sth" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
    return view('contact',[
        'generals' => $data_general,
        'fram' => $fram,
    ]);
   }
}

