<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user(){ // ย้อนกลับไป ที่ user
        //return $this->belongsTo(User::class,'u_id','user_id');// fk , pk
        return $this->belongsTo(User::class);
    }
}

