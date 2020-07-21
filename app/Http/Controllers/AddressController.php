<?php

namespace App\Http\Controllers;
use App\Address;
use App\User;
use Illuminate\Http\Request;
use DB;
use  App\Http\Requests\PasswordRequest; // Vailadasion
use  App\Http\Requests\AddressRequest; // Vailadasion
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class AddressController extends Controller
{
    public function addaddress(AddressRequest $request){


                $address = new Address();
                $address->firstname = $request->firstname;
                $address->lastname = $request->lastname;
                $address->email = $request->email;
                $address->phonenumber = $request->phonenumber;
                $address->adress1 = $request->adress1;
                $address->adress2 = $request->adress2;
                $address->adress3 = $request->adress3;
                $address->other = $request->other;
                $address->stdefalse = 0; //เช็คสถานะ defalse address
                $address->user_id = auth()->user()->id;
                $address->save();



        return response()->json([
           'status' => 'success',
             ]);

    }
    public function getdataaddress(Request $request){
            $address= Address::find($request->id);
            return response()->json([
                'address' =>  $address,
                  ]);
    }
    public function editaddress(AddressRequest $request){
        if(!empty($request->id)){
            $address = Address::find($request->id);
            $address->firstname = $request->firstname;
            $address->lastname = $request->lastname;
            $address->email = $request->email;
            $address->phonenumber = $request->phonenumber;
            $address->adress1 = $request->adress1;
            $address->adress2 = $request->adress2;
            $address->adress3 = $request->adress3;
            $address->other = $request->other;
            $address->update();
         }

    return response()->json([
       'status' => 'success',
         ]);

    }
    public function checkmark(Request $request){

         Address::where('user_id', auth()->user()->id)
                  ->update(['stdefalse' => 0]);

           $address= Address::find($request->id);
           $address->stdefalse = 1;
           $address->update();

        return response()->json([
            'status' => 'success',
              ]);
    }
    public function deleteaddress(Request $request){
        Address::where('id', $request->id)->delete();
        return response()->json([
            'status' => 'success',
              ]);
    }
    public function modifypass(PasswordRequest $request){

        $user= User::find(auth()->user()->id);
        $user->password = bcrypt($request->newpassword);
        $user->update();
        return response()->json([
            'status' => 'success',
              ]);
    }

}
