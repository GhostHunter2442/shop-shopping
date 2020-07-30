<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CouponRepository;
use Yajra\Datatables\Datatables;
class CouponbackendController extends Controller
{
    public function index(){

        return view('backend.coupon.index');
     }
     public function getDatatables(CouponRepository $coupon)
     {

         $data = $coupon->getDatatables();
         $datatables = app('datatables');
         return $datatables->eloquent($data)
             ->blacklist(['id'])
             ->make(true);

     }
     public function renderForm(CouponRepository $coupon, $id){

        $cate = $coupon->getById($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'สร้างคูปองส่วนลด';
        $data['data'] = !empty($cate) ? $cate : $coupon->castData();
        return view('backend.coupon.partials.form', $data);
    }

    public function store(CouponRepository $coupon, Request $request){
        $result = $coupon->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success'
        ], 200);
    }

    public function update(CouponRepository $coupon, Request $request, $id){
        $result = $coupon->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status
        ], 200);
    }


    public function delete(CouponRepository $coupon, $id){
        $result = $coupon->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status
        ], 200);
    }
}
