<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    public function invoices(){
        return  $this->belongsTo(Invoice::class);
      }


      public function product()
      {
          return  $this->belongsTo(Product::class);
      }
}
