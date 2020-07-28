<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Invoice;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoryCount = Category::count();
        $productCount = Product::count();
        $UserCount = User::count();
        $OrderCount = Invoice::where('status_order',1)->count();



            if(auth()->user()->hasRole("admin|employee")){
            return view('home',[
                'categoryCount'=> $categoryCount,
                'productCount' =>$productCount,
                'UserCount'=> $UserCount,
                'OrderCount'=> $OrderCount,
            ]);
            }else{
                auth()->user()->assignRole("member");  // สร้าง role ใหม่
                auth()->user()->givePermissionTo('viewSales');// สร้าง per ซื้อสินค้า
                return redirect('/');
            }

        }

}
