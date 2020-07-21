<?php

namespace App\Http\Controllers;
use App\Favorite;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;

class Cartdetailcontroller extends Controller
{
      //vue
    public function cartdetail(){
        return view('cartdetail');
    }

    public function getcartdetail()
    {
        $count_cart =  Cart::where('user_id', auth()->user()->id)->sum('qty');
        $listCart = auth()->user()->products()->latest()->get(); // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
      //  $sumPrice = auth()->user()->products()->sum('products.price');
        $sumPrice = array();
        foreach ($listCart  as $p) { // save

            $sumPrice =  ($p->pivot->qty*$p->price);

        }
            return response()->json([
            'listcarts' => $listCart,
            'sumprices'=> $sumPrice
            ]);
         // return response()->json($listCart);
    }
    public function addcartdetail($product_id,$valueqtr)
    {


        $qty = auth()->user()->products()->where('product_id', $product_id)->first();
        // auth()->user()->products()->attach($product_id); //ถ้าหยิบซ้ำจะ error
        if (isset($qty)) {
            auth()->user()->products()
                ->syncWithoutDetaching([$product_id => ['qty' => $qty->pivot->qty + $valueqtr]]);
        } else {
            auth()->user()->products()
                ->syncWithoutDetaching([$product_id => ['qty' => $valueqtr]]); //สิ้นค้ายังไม่มี
        }
        $listCart = auth()->user()->products()->latest()->get(); // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
        return response()->json($listCart);
    }


    public function downcartdetail($product_id,$valueqtr)
    {


        $qty = auth()->user()->products()->where('product_id', $product_id)->first();
        // auth()->user()->products()->attach($product_id); //ถ้าหยิบซ้ำจะ error
        if (isset($qty)) {
            auth()->user()->products()
                ->syncWithoutDetaching([$product_id => ['qty' => $qty->pivot->qty - $valueqtr]]);
        } else {
            auth()->user()->products()
                ->syncWithoutDetaching([$product_id => ['qty' => 1]]);
        }
        $listCart = auth()->user()->products()->latest()->get(); // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
        return response()->json($listCart);
    }

    public function addfavorite($product_id)
    {
        auth()->user()->productfavorites()->toggle($product_id); //1 ครั้งเพ่ิม อีก 1 ครั้งลบ find
        // $listCart = auth()->user()->productfavorites()->latest()->get(); // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
        $qty = auth()->user()->productfavorites()->where('product_id', $product_id)->first();
    //    $idfav = Favorite::find($product_id);
        return response()->json($qty);
    }
    public function getfavorite($product_id)
    {

        $qty = auth()->user()->productfavorites()->where('product_id', $product_id)->first();
        return response()->json($qty);
    }
    public function confirm()
    {

        $listCart = auth()->user()->products()->latest()->get(); // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
        foreach ($listCart  as $p) { // save
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->product_id = $p->id;
            $order->qty = $p->pivot->qty;
            $order->price = $p->price;
            $order->total = ($p->pivot->qty*$p->price);
            $order->save();

             // delete
            auth()->user()->products()->detach($p->id);
        }

        $listCart = auth()->user()->products()->latest()->get(); // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
        return response()->json($listCart);
    }

    public function delcartdetail($product_id){
        auth()->user()->products()->detach($product_id);
        // $listCart = auth()->user()->products()->latest()->get();
        return response()->json(200);
    }

    public function getitemcount(){
         $conutitem = Cart::where('user_id',auth()->user()->id)->sum('qty');
        return response()->json($conutitem);
    }
}
