<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use  App\Http\Requests\FormRequest; // Vailadasion
class ProfileController extends Controller
{
    public function getprofile(){
        $profile= auth()->user()->profile()->get();
          $userporfile  = User::where('id', auth()->user()->id)->get();
        return response()->json([
            'userporfile' => $userporfile,
            'profile' =>$profile

              ]);
    }
    public function updateprofile(Request $request){
     $this->validate($request,[
        'name' => 'required',
        'dateofbirth' => 'required',
        // 'male' => 'required',
    ],[
        'name.required' => 'กรุณากรอกชื่อ',
        'dateofbirth.required' => 'กรุณากรอกวันเกิด',
        // 'male.required' => 'กรุณาเลือกเพศ',
    ]);

          $user = User::find($request->userid);
          $user->name=$request->name;
          $user->update();
        if(!empty($request->proid)){
            $profile = Profile::find($request->proid);
            $profile->dateofbirth= $request->dateofbirth;
            $profile->gender= $request->gender;
            $profile->update();

         }else{
            $profile = new Profile();
            $profile->user_id=$request->userid;
            $profile->dateofbirth= $request->dateofbirth;
            $profile->gender= $request->gender;
            $profile->save();
         }


     }
}
