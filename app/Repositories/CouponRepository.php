<?php

namespace App\Repositories;
use App\Coupon;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Carbon\Carbon;

class CouponRepository
{

    public function castData()
    {
        $data = [
            'id' => null,
            'name' => null,
            'percen' => null,
            'discount' => null,
            'code' => null,
            'end_datetime' => Carbon::today(),
            'product_id' => null,
            'detail' => null,
            'status' => null,
            'created_at'=> null,
            'updated_at'=> null,
        ];
        return (object) $data;
    }
    public function getAll()
    {
        $coupon = Coupon::all();
        return $coupon;
    }
    public function getById($id)
    {
        $coupon =  Coupon::find($id);
        return $coupon;
    }
    public function getByPorductID($id)
    {    $coupon = $this->getById($id);
        if(empty($coupon)) return false;

        $product_id = unserialize(Coupon::find($id)->product_id);
        return $product_id;
    }

    public function getDatatables()
    {
        $query = Coupon::select('id', 'name','percen','discount','code','end_datetime','status')->latest('id');
        return $query;
    }

    public function store($request)
    {
        $coupon = new Coupon;
        $coupon->name = $request->name;
        $coupon->percen = $request->percen;
        $coupon->discount = $request->discount;
        $coupon->code = $request->code;
        $coupon->status = $request->status;
        $coupon->product_id = serialize($request->product_id);
        $coupon->end_datetime =  Carbon::createFromFormat('m/d/Y', $request->end_datetime)->toDateString();
        $coupon->save();
        return true;
    }
    public function update($request, $id)
    {

        // dd($request->product_id);
        $coupon = $this->getById($id);
        if(empty($coupon)) return false;

        $coupon->name = $request->name;
        $coupon->percen = $request->percen;
        $coupon->discount = $request->discount;
        $coupon->code = $request->code;
        $coupon->status = $request->status;
        $coupon->product_id = serialize($request->product_id);
        $coupon->end_datetime = Carbon::createFromFormat('m/d/Y', $request->end_datetime)->toDateString();
        $coupon->save();
        return true;
    }
    public function delete($id)
    {
        $coupon = $this->getById($id);
        if(empty($coupon)) return false;

        $coupon->delete();
        return true;
    }

}
