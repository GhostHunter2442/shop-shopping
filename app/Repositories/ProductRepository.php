<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Storage; // resize picture
use App\Product;
use Image;
/**
 * Class ProductRepository.
 */
class ProductRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'name' => null,
            'slug' => null,
            'price'=> null,
            'stock'=> null,
            'discount'=> null,
            'weight'=> null,
            'detail'=> null,
            'picture'=> null,
            'picture_detail_one'=> null,
            'picture_detail_two'=> null,
            'picture_detail_three'=> null,
            'picture_detail_four'=> null,
            'status'=> null,
            'category_id'=> null,
            'created_at'=> null,
            'updated_at'=> null,
        ];
        return (object) $data;
    }
    public function getAll()
    {
        $product = Product::all();
        return $product;
    }
    public function getById($id)
    {
        $product = Product::find($id);
        return $product;
    }
    public function getBySlug($slug)
    {
        $product = Product::where('slug',str_slug($slug))->first();
        return $product;
    }

    public function getDatatables()
    {
        $query = Product::select('id', 'name', 'price', 'stock', 'picture', 'status', 'category_id','weight','discount')->latest('id');
        return $query;
    }

    public function saveImage($picture){

            $newFileName = uniqid().'.'.$picture->extension();
            //upload file
            $picture->storeAs('images',$newFileName,'public'); //public เปลี่ยนเป็น amazon S3
            return $newFileName;



    }
    public function updateImage($picture,$old_picture){

        //delete file

        if ($old_picture != 'nopic.png') {
        Storage::disk('public')->delete('images/'.$old_picture);
        Storage::disk('public')->delete('images/resize/'.$old_picture);
        }

        $newFileName = uniqid().'.'.$picture->extension();
        //upload file
        $picture->storeAs('images',$newFileName,'public'); //public เปลี่ยนเป็น amazon S3
        return $newFileName;



 }
 public function resizeImage($picture,$newFileName){
            //resize
        $path = Storage::disk('public')->path('images/resize/');
        Image::make($picture->getRealPath(), $newFileName)->resize(270,270,function($constraint){
            $constraint->aspectRatio();
        })->save($path.$newFileName); //width ,higth
 }

    public function store($request)
    {

        $product = new Product;
        $product->name = $request->name;
        $product->slug = str_slug($request->slug);
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        $product->weight = $request->weight;
        $product->detail = $request->detail;

        $product->status = $request->status;
        $product->category_id = $request->category_id;


        if($request->hasFile('picture')){
        $product->picture = $this->saveImage($request->picture);
        $this->resizeImage($request->picture,$product->picture);
        }
        if($request->hasFile('picture_detail_one')){
            $product->picture_detail_one = $this->saveImage($request->picture_detail_one);
            $this->resizeImage($request->picture_detail_one,$product->picture_detail_one);
        }
        if($request->hasFile('picture_detail_two')){
            $product->picture_detail_two = $this->saveImage($request->picture_detail_two);
            $this->resizeImage($request->picture_detail_two,$product->picture_detail_two);
        }
        if($request->hasFile('picture_detail_three')){
            $product->picture_detail_three = $this->saveImage($request->picture_detail_three);
            $this->resizeImage($request->picture_detail_three,$product->picture_detail_three);
        }



        $product->save();

        return true;
    }
    public function update($request, $id)
    {
        // dd($request->detail);
        $product = $this->getById($id);
        $product->name = $request->name;
        $product->slug = str_slug($request->slug);
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        $product->weight = $request->weight;
        $product->detail = $request->detail;

        $product->status = $request->status;
        $product->category_id = $request->category_id;

        if($request->hasFile('picture')){
            $product->picture = $this->updateImage($request->picture,$product->picture);
            $this->resizeImage($request->picture,$product->picture);
        }
        if($request->hasFile('picture_detail_one')){
            $product->picture_detail_one = $this->updateImage($request->picture_detail_one,$product->picture_detail_one);
            $this->resizeImage($request->picture_detail_one,$product->picture_detail_one);
        }
        if($request->hasFile('picture_detail_two')){
            $product->picture_detail_two = $this->updateImage($request->picture_detail_two,$product->picture_detail_two);
            $this->resizeImage($request->picture_detail_two,$product->picture_detail_two);
        }
        if($request->hasFile('picture_detail_three')){
            $product->picture_detail_three = $this->updateImage($request->picture_detail_three,$product->picture_detail_three);
            $this->resizeImage($request->picture_detail_three,$product->picture_detail_three);
        }



        $product->update();
        return true;
    }
    public function delete($id)
    {
        $product = $this->getById($id);

        if ($product->picture != 'nopic.png'){
            Storage::disk('public')->delete('images/'.$product->picture);
            Storage::disk('public')->delete('images/resize/'.$product->picture);
        }

        // if(empty($product)) return false;
         $product->delete();
         return true;
    }

}
