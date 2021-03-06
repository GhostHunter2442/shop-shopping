<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Rating;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function topprice($cat_id)
    {
        return view('topprice',compact('cat_id'));
    }
    public function show_discount(){
        return view('showdiscount');
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

            return  Product::where('status','normal')
                            ->where('name', 'like', '%' .$request->keywords . '%')
                            ->with(array('ratings'=>function($query){
                            $query->select('product_id',
                            DB::raw('sum(ratings.rating)/count(ratings.rating) as total,count(ratings.rating) as qty'))
                            ->groupBy('product_id');
                      }))->latest()->paginate(12);
         }
         elseif(!empty($catID)){
            return  Product::where('status','normal')->where('category_id',$catID)
                            ->with(array('ratings'=>function($query){
                            $query->select('product_id',
                            DB::raw('sum(ratings.rating)/count(ratings.rating) as total,count(ratings.rating) as qty'))
                            ->groupBy('product_id');
                        }))->latest()->paginate(12);
         }


         $product = Product::where('status','normal')->with(array('ratings'=>function($query){
            $query->select('product_id',
            DB::raw('sum(ratings.rating)/count(ratings.rating) as total,count(ratings.rating) as qty'))
               ->groupBy('product_id');
         }))->latest()->paginate(12);


        return response()->json($product);
    }
    public function getlastprice(){
        $order = Order::select('id','invoice_id','product_id')
                     ->with(array('product'=>function($query){
                        $query->select('id','name','picture','price','slug');
                    }))
                    ->latest()
                    ->limit(5)
                    ->get();
         return response()->json($order);
    }
    public function showdiscount()
    {
        $product_distcount = Product::latest()->limit(6)->get();
        return response()->json($product_distcount);
    }
    public function gettopprice($id)
    {

        $category=Category::select('id','name')
                          ->where('id',$id)
                          ->with(array('products'=>function($query){
                              $query ->select('id','name','picture','price','slug','category_id','stock','discount','created_at')
                                      ->withCount('orders')
                                      ->having('orders_count', '>', 0)
                                      ->orderBy('orders_count','desc')->take(8);

                              $query->with(array('ratings'=>function($query){
                                    $query->select('product_id',
                                    DB::raw('sum(ratings.rating)/count(ratings.rating) as total,count(ratings.rating) as qty'))
                                    ->groupBy('product_id');
                                }));
                            }))->get();


        return response()->json($category);
    }

    public function get_show_discount()
    {
        $product_distcount =Product::where('status','normal')
                                   ->where('discount','!=',0)
                                   ->with(array('ratings'=>function($query){
                                        $query->select('product_id',
                                        DB::raw('sum(ratings.rating)/count(ratings.rating) as total,count(ratings.rating) as qty'))
                                        ->groupBy('product_id');
                                }))->orderBy('discount','desc')
                                    ->latest()->paginate(12);

        return response()->json($product_distcount);
    }

}
