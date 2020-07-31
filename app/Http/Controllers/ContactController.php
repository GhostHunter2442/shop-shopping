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

    return view('contact',[
        'generals' => $data_general,
    ]);
   }
}

