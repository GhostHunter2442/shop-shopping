<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
class ShopController extends Controller
{
    public function index($id)
    {
        $productid = Product::find($id);
        return view('shop',compact('id'));
    }

    public function getshop(Request $request){

        $product = Product::find($request->id);
        // $product = Product::where('id',$request->id)->get();

        return response()->json(
            $product
         );
    }
}
