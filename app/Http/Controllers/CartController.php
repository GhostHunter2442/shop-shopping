<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class CartController extends Controller
{
    public function index()
    {
        $count_cart =  Cart::where('user_id', auth()->user()->id)->sum('qty');
        $listCart = auth()->user()->products()->latest()->get(); // ดึงศินค้าขอคนี่ว่ามีสินค้าชนิดใดบ้าง เรียงจากวันที่เพิม desc
        $sumPrice = auth()->user()->products()->sum('products.price');



        return view('cart', [
            'count_cart' => $count_cart,
            'listCart' => $listCart,
            'sumPrice' => $sumPrice
        ]);


    }

    public function store($product_id)
    {

        $qty = auth()->user()->products()->where('product_id', $product_id)->first();
        // auth()->user()->products()->attach($product_id); //ถ้าหยิบซ้ำจะ error
        if (isset($qty)) {
            auth()->user()->products()
                ->syncWithoutDetaching([$product_id => ['qty' => $qty->pivot->qty + 1]]);
        } else {
            auth()->user()->products()
                ->syncWithoutDetaching([$product_id => ['qty' => 1]]);
        }
        //syncWithoutDetaching เจอข้อมูลซ้ำไปลบ
        return  back()->with('feedback', 'เพิ่มข้อมูลลงในตระกร้าเรียบร้อย');
    }

    public function delete($product_id)
    {
        auth()->user()->products()->detach($product_id);
        return  back()->with('feedback', 'ลบสินค้าในตระกร้าเรียบร้อย');
    }

   

    public function updateQtr($product_id){
        //return 'ok'.$product_id;

        $qty = auth()->user()->products()->where('product_id', $product_id)->first();
        // auth()->user()->products()->attach($product_id); //ถ้าหยิบซ้ำจะ error
        if (isset($qty)) {
            auth()->user()->products()
                ->syncWithoutDetaching([$product_id => ['qty' => $qty->pivot->qty + 1]]);
        } else {
            auth()->user()->products()
                ->syncWithoutDetaching([$product_id => ['qty' => 1]]);
        }
        //syncWithoutDetaching เจอข้อมูลซ้ำไปลบ
        return  back()->with('feedback', 'เพิ่มข้อมูลลงในตระกร้าเรียบร้อย');
    }




}

