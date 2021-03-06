<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use DB;

class ShopController extends Controller
{
    public function index($slug)
    {
        $prduct_id = Product::where('slug', $slug)->firstOrFail();
        $id = $prduct_id->id;
        $cat_id = $prduct_id->category_id;

        return view('shop', compact('id', 'cat_id'));
    }

    public function getshop(Request $request)
    {
        $product = Product::find($request->id);
        return response()->json(
            $product
        );
    }
    public function getConcerned($cat_id, $id)
    {
        $product = Product::where('id', '!=', $id)->where('category_id', $cat_id)
                ->with(array('ratings'=>function($query){
                    $query->select('product_id',
                    DB::raw('sum(ratings.rating)/count(ratings.rating) as total,count(ratings.rating) as qty'))
                    ->groupBy('product_id');
                }))
                ->inRandomOrder()->limit(4)->get();
        return response()->json(
            $product
        );
    }
}
