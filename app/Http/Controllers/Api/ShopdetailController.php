<?php

namespace App\Http\Controllers\Api;
use App\Favorite;
use App\User;
use App\Product;
 use DB;
 use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class ShopdetailController extends Controller
{

    public function getfavorite($product_id)
    {
            if (Auth::check()) {
                $favorite = auth()->user()->productfavorites()->where('product_id', $product_id)->first();
            }else{
                $favorite = false; // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
            }


            return response()->json([
                'favorite' => $favorite
            ],200);

    }
    public function getallfavorite()
    {

            if (Auth::check()) {
                $favorite =  auth()->user()->productfavorites()->latest()->get();
            }else{
                $favorite = false;
            }

                return response()->json($favorite);
            }

    public function getsumitem(){
        // $listCart = Cart::all();
            if (Auth::check()) {
                $listCart = auth()->user()->products()->latest()->get(); // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
            }else{
                $listCart = false; // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
            }

            return response()->json($listCart);
        }

}
