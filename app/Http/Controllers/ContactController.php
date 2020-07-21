<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index(){

    $email= 'dataghosthunter@gmail.com';
    $phone= '081-9999XXX';
    // $count_cart =  Cart::where('user_id',auth()->user()->id)->sum('qty');
    return view('contact',[
        'email' => $email,
        'phone'=> $phone,
        // 'count_cart' => $count_cart
    ]);
   }
}

