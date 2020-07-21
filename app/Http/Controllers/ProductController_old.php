<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use  App\Http\Requests\ProductRequest; // Vailadasion
use Illuminate\Support\Facades\Storage; // resize picture


use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


         //$product = Product::orderBy('id','desc')->paginate(20);
         $product = Product::with('category')->orderBy('id','desc')->paginate(20);   //with('category')   ที่อยุ่ใน model product many to one
         return  view('backend.product.index',[
            'product' => $product
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all()->pluck('name','id');
        return  view('backend.product.create',[
             'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        //check picture and upload มีไฟล์มาหรือไม่

        if($request->hasFile('picture')){
            $newFileName = uniqid().'.'.$request->picture->extension();
            //upload file
            $request->picture->storeAs('images',$newFileName,'public'); //public เปลี่ยนเป็น amazon S3
            $product->picture = $newFileName;

            //resize
            $path = Storage::disk('public')->path('images/resize/');
            Image::make($request->picture->getRealPath(), $newFileName)->resize(270,270,function($constraint){
                $constraint->aspectRatio();
            })->save($path.$newFileName); //width ,higth
        }

        $product->save();

        return redirect()->route('product.index')->with('feedback','บันทึกข้อมูลเรียยร้อยเเล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all()->pluck('name','id');
        return view('backend.product.edit',[
            'product'=> $product,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;



        //delete file and uplaod new picture

        if($request->hasFile('picture')){

       //delete file
       if ($product->picture != 'nopic.png') {
        Storage::disk('public')->delete('images/'.$product->picture);
        Storage::disk('public')->delete('images/resize/'.$product->picture);
    }


            $newFileName = uniqid().'.'.$request->picture->extension();
            //upload file
            $request->picture->storeAs('images',$newFileName,'public'); //public เปลี่ยนเป็น amazon S3
            $product->picture = $newFileName;

            //resize
            $path = Storage::disk('public')->path('images/resize/');
            Image::make($request->picture->getRealPath(), $newFileName)->resize(120, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.$newFileName); //width ,higth
        }


        $product->save();
        return redirect()->route('product.index')->with('feedback','เเก้ไขข้อมูลเรียยร้อยเเล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->picture != 'nopic.png'){
            Storage::disk('public')->delete('images/'.$product->picture);
            Storage::disk('public')->delete('images/resize/'.$product->picture);
        }
        $product->delete();
         return redirect()->route('product.index')->with('feedback','ลบข้อมูลเรียยร้อยเเล้ว');
    }
}



