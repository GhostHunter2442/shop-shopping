<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    public function index()
    {


        return view('welcome');

    }

    public function getcategory()
    {


        $category = Category::all();
        $total_product = Product::groupBy('category_id')
            ->select('category_id', DB::raw('count(*) as total'))
            ->get();
        $last_price = Product::latest()->limit(3)->get();
            return response()->json([
                'category'=>$category,
                'total_product'=>$total_product,
                'last_price' =>$last_price
                ]);
    }
    public function getautocomplate(Request $request)
    {

        $product = Product::where('status','normal')->get();
        return response()->json($product);
    }
    public function showall(Request $request)
    {
          $catID= $request->input('getcatagoryID');
         if(!empty($request->keywords)){
            return Product::where('name', 'like', '%' .$request->keywords . '%')->latest()->paginate(12);
         }
         elseif(!empty($catID)){
            return Product::where('category_id',$catID)->latest()->paginate(12);
         }
        //  $product = Product::whereIn('category_id',['4'])->paginate(12);
        $product = Product::latest()->paginate(12);
        return response()->json($product);
    }
    public function showdiscount()
    {
        $product_distcount = Product::latest()->limit(6)->get();
        return response()->json($product_distcount);
    }

    // public function show($id)
    // {

    //     //$product = Category::findOrFail($id)->products()->get();
    //     $count_product= Product::where('category_id', '=', $id)->count();
    //     $categoryAll = Category::all();
    //     $total_product = Product::groupBy('category_id')
    //         ->select('category_id', DB::raw('count(*) as total'))
    //         ->get();
    //         // ->paginate(12)
    //     $category = Category::with(['products' => function ($query) {
    //                              $query->orderBy('id', 'desc');
    //     }])->where('id', '=', $id)->first();
    //     $product_last_price = Product::latest()->limit(3)->get();
    //     // $count_cart =  Cart::where('user_id',auth()->user()->id)->sum('qty');
    //     return view('show', [
    //         'category' => $category,
    //         'categoryAll' => $categoryAll,
    //         'total_product' => $total_product,
    //         'product_last_price' => $product_last_price,
    //         'count_product' => $count_product,
    //         // 'count_cart' => $count_cart,
    //     ]);
    // }
}
