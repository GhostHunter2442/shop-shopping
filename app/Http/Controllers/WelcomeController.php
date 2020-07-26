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
            return Product::where('status','normal')->where('name', 'like', '%' .$request->keywords . '%')->latest()->paginate(12);
         }
         elseif(!empty($catID)){
            return Product::where('status','normal')->where('category_id',$catID)->latest()->paginate(12);
         }

        $product = Product::where('status','normal')->latest()->paginate(12);
        return response()->json($product);
    }
    public function showdiscount()
    {
        $product_distcount = Product::latest()->limit(6)->get();
        return response()->json($product_distcount);
    }


}
