<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;

class GeneralController extends Controller
{
   
    public function renderForm(GeneralRepository $gneral){
        $cate = $gneral->getById(1);
        $data['title'] = !empty($cate) ? $cate['name'] : 'เเก้ไขข้อมูลเวป';
        $data['data'] = !empty($cate) ? $cate : $gneral->castData();
        return view('backend.general.form_index', $data);
      }

      public function update(GeneralRepository $gneral,Request $request)
      {

          $result = $gneral->update($request,1);
          $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาดนะ!';
          $status = $result ? 'success' : 'error';
          return redirect()->route('renderForm.index')->with([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success',
        ], 200);

      }

}
