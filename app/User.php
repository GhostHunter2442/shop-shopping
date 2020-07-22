<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles; //เพิ่ม HasRoles
class User extends Authenticatable
{
    use HasRoles,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


 

      // one to one
    // การใช้งาน user()->profile->phonenumber
    public function profile() {
        //return $this->hasOne(Profile::class,'u_id');//fk ของตาราง profile
        return $this->hasOne(Profile::class);//fk default is user_id
    }
    public function addresses() {
        return $this->hasOne(Address::class);//fk default is user_id
    }

    public function invoice() {
        return $this->hasOne(Order::class);//fk default is user_id
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

      //many ot many  สินค้านี่ใครซื้อบ้าง
      public function products() {
        return $this->belongsToMany(Product::class,'carts','user_id','product_id')->withPivot('qty')->withTimestamps();
    }

    public function productfavorites() {
        return $this->belongsToMany(Product::class,'favorites','user_id','product_id')->withPivot('qty')->withTimestamps();
    }



}
