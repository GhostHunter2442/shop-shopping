<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function invoice(){
        return  $this->belongsTo(Bank::class);
      }
}
