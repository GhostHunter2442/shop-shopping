<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $incremmenting = false;
      protected $keyType = 'string';


    public function orders(){ //ใช้การ join table orders and user
        return $this->hasMany(Order::class);
    }

    public function bank(){
        return  $this->belongsTo(Bank::class);
        // return $this->hasMany(Bank::class);
      }
      public function banks(){
       
        return $this->hasMany(Bank::class);
      }
      public function address(){
        return  $this->belongsTo(Address::class);
      }

      public function user(){
        return  $this->belongsTo(User::class);
      }

    public function getStatusPayAttribute()
    {
        return $this->paymentid == '1' ? 'โอนผ่านธนาคาร' : ($this->paymentid == '2' ? 'เก็บเงินปลายทาง' : 'ผ่านบัตรเครดิต');
    }

}
