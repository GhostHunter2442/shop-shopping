<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    // use Sluggable;

    // accessorie
    public function getStatusNameAttribute()
    {
        return ($this->status == 'normal' ? 'ปกติ' : 'ยกเลิก');
    }
    // vat
    public function getVatproductAttribute()
    {
        return $this->price * 0.07;
    }

    public function getVatproductsumAttribute()
    {
        return ($this->price * 0.20) + ($this->price);
    }

    public function getsumQtrAttribute()
    {  // คำนวนเเต่ละชิ้น คูรด้วยราคาสินค้า
        return ($this->price) * ($this->pivot->qty);
    }



    // many to one
    public function category()
    {
        //$this->belongsTo(Category::class,'cat_id','c_id');// cat_id fk ของ product ส่วน c_id pk ของ catefories
        return  $this->belongsTo(Category::class);
    }

    public function ratings()
    {
        return  $this->hasMany(Rating::class);
    }



    //many ot many  ใครเป้นคนซื้อ ชืนค้านี้

    public function users()
    {
        return $this->belongsToMany(User::class, 'carts', 'product_id', 'user_id')->withPivot('qty')->withTimestamps();
    }
    public function userfavorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id')->withPivot('qty')->withTimestamps();
    }
}
