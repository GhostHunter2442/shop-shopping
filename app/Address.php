<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user(){ // ย้อนกลับไป ที่ user
        return $this->belongsTo(User::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

}
