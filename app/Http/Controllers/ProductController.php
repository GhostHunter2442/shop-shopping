<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; // resize picture
class ProductController extends Controller
{
    public function index(){
      return view('backend.product.index');
   }
   public function getDatatables(ProductRepository $product)
   {

       $data = $product->getDatatables();
       $datatables = app('datatables');
       return $datatables->eloquent($data)
             ->addColumn('category_name', function ($value) {
                return $value->category->name;
            })
            ->make(true);

   }
   public function renderForm(ProductRepository $product,CategoryRepository $category, $id){


    $cate = $product->getById($id);
    $data['title'] = !empty($cate) ? $cate['name'] : 'สร้างรายการสินค้า';
    $data['data'] = !empty($cate) ? $cate : $product->castData();
    $data['categories'] = $category->getAll();
    return view('backend.product.partials.form', $data);
  }
  public function store(ProductRepository $product,Request $request)
  {
    // dd($request->hasFile('picture'));
    // dd($request->file('picture'));
      $result = $product->store($request);
      return response()->json([
          'message' => 'บันทึกข้อมูลสำเร็จ',
          'status' => 'success',
      ], 200);
  }
  public function update(ProductRepository $product,Request $request, $id)
  {
// dd($request->hasFile('picture'));
// dd($request->picture);
      $result = $product->update($request, $id);
      $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
      $status = $result ? 'success' : 'error';
      return response()->json([
          'message' => $message,
          'status' => $status,
      ], 200);
  }

  public function delete(ProductRepository $product, $id)
  {
      $result = $product->delete($id);
      $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
      $status = $result ? 'success' : 'error';
      return response()->json([
          'message' => $message,
          'status' => $status,
      ], 200);
  }

  public function checkSlug(ProductRepository $product, Request $request)
  {
      $result = $product->getBySlug($request->slug);
      $status = true;
      if(!empty($result)){
          $status = $result->id != $request->id ? false : true;

      }
      return response()->json($status);
  }

}
