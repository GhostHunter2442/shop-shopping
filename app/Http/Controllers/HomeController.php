<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
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


        // auth()->user()->assignRole('member');  // สร้าง role ใหม่
        // if(auth()->user()->hasRole("member")){
        //     return redirect('/');
        //     // return view('welcome');
        // }
        // if(auth()->user()->hasRole("admin")){
        //     return redirect('/home');
            // redirect()->to('home');
            if(auth()->user()->hasRole("admin|employee")){
            return view('home',[
                'categoryCount'=> $categoryCount,
                'productCount' =>$productCount,
                'UserCount'=> $UserCount,
            ]);
            }else{
                auth()->user()->assignRole("member");  // สร้าง role ใหม่
                return redirect('/');
            }

        }

}
