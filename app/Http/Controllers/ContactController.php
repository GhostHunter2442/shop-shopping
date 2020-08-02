<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use App\General;
class ContactController extends Controller
{
   public function index(){

       $data_general =General::all();

    return view('contact',[
        'generals' => $data_general,
    ]);
   }

   public function getdatageneral(){

    $data_general =General::all();
    return response()->json( $data_general);

   }
}

