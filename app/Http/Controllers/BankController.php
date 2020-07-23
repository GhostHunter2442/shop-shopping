<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BankRepository;

class BankController extends Controller
{
    public function index(){
        return view('backend.bank.index');
     }
     public function getDatatables(BankRepository $bank)
     {

         $data = $bank->getDatatables();
         $datatables = app('datatables');
         return $datatables->eloquent($data)->make(true);

     }
     public function renderForm(BankRepository $bank, $id){
        $cate = $bank->getById($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'สร้างธนาคาร';
        $data['data'] = !empty($cate) ? $cate : $bank->castData();
        return view('backend.bank.partials.form', $data);
      }

      public function store(BankRepository $bank,Request $request)
      {

          $result = $bank->store($request);
          return response()->json([
              'message' => 'บันทึกข้อมูลสำเร็จ',
              'status' => 'success',
          ], 200);
      }

      public function update(BankRepository $bank,Request $request, $id)
      {

          $result = $bank->update($request, $id);
          $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาดนะ!';
          $status = $result ? 'success' : 'error';
          return response()->json([
              'message' => $message,
              'status' => $status,
          ], 200);
      }
      public function delete(BankRepository $bank, $id)
      {
          $result = $bank->delete($id);
          $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
          $status = $result ? 'success' : 'error';
          return response()->json([
              'message' => $message,
              'status' => $status,
          ], 200);
      }
}
