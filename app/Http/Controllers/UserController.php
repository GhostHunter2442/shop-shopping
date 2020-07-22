<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Role;
use App\Permission;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {

        return view('backend.user.index');
    }

    public function getDatatables(UserRepository $user)
    {
        $data = $user->getDatatables();
        $datatables = app('datatables');
        return $datatables->eloquent($data)
            ->make(true);
    }

    public function renderForm(UserRepository $user, $id)
    {
        $paemission_data = array();

        $cate = $user->getById($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'สร้างผู้ใช้งานใหม่';
        $data['data'] = !empty($cate) ? $cate : $user->castData();
        $data['rolename'] = Role::all();
        $per= Permission::where('model_id',$id)->pluck('permission_id')->toArray();

          $data['permissions'] =$per;
        //  return  $data['premission'];
        return view('backend.user.partials.form', $data);
    }

    public function store(UserRepository $user, Request $request)
    {

        $result = $user->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success',
        ], 200);
    }

    public function update(UserRepository $user, Request $request, $id)
    {

        $result = $user->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function delete(UserRepository $user, $id)
    {
        $result = $user->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function usernameCheck(UserRepository $user, Request $request)
    {
        $result = $user->getByUsername($request->email);
        $status = true;
        if(!empty($result)){
            $status = $result->id != $request->id ? false : true;
        }
        return response()->json($status, 200);
    }

    public function passwordCheck(UserRepository $user, Request $request)
    {
        if(!empty($request->id)){
            $result = $user->getByPassword($request->password_old,$request->id);
            return response()->json($result, 200);
        }

    }
}
