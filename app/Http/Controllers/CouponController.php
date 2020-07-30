<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
class CouponController extends Controller
{
    public function index(){
        return view('coupon');
    }

    public function getcoupon(){
            $coupon =Coupon::select('id','name','percen','discount','code','end_datetime','status','created_at')
            ->where('status','normal')
            ->latest()
            ->get();
            return response()->json($coupon);
    }
    public function checkcoupon($code){
        $coupon =Coupon::where('code',$code)->get();
        $coupon = $coupon->map(function($i) {
            $i->product_id_map = unserialize($i->product_id);
            return $i;
        });
        return response()->json($coupon);
}

}
