<?php

namespace App\Http\Controllers;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){


       return view('backend.category.index');
    }
    public function getDatatables(CategoryRepository $category)
    {

        $data = $category->getDatatables();
        $datatables = app('datatables');
        // return DataTables::of($data)->blacklist(['id'])->make(true);
        return $datatables->eloquent($data)
            ->blacklist(['id'])
            ->make(true);

    }
    public function renderForm(CategoryRepository $category, $id){

        $cate = $category->getById($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'สร้างหมวดหมู่สินค้า';
        $data['data'] = !empty($cate) ? $cate : $category->castData();
        return view('backend.category.partials.form', $data);
    }

    public function store(CategoryRepository $category, Request $request){
        $result = $category->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success'
        ], 200);
    }

    public function update(CategoryRepository $category, Request $request, $id){
        $result = $category->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status
        ], 200);
    }


    public function delete(CategoryRepository $category, $id){
        $result = $category->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status
        ], 200);
    }
}

