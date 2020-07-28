<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable =[
           'product_id','user_id','rating','invoice_id'
    ];

    public function products(){
        return $this->belongsTo(Product::class); // products tabel fk คือ category_id
    }
}
