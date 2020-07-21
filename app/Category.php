<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $table = 'my_category;  กรณี tavle กับ model ชือไม่ สัมพันธ์กันย
    //protected $primaryKey = 'c_id';  กรณี table มี primarykey ที่ไม่ใช่ชื่อ id ต้องระบุเพิ่ม
  //  public $incremmenting = false; //กณีไม่ autoincrement ต้องปิด
    // protected $keyType = 'string'; กาณี c_id เป็น varchar
    // public $timestamps = false; กรณีไม่มี created_at and updated_at

    // ond to many

    public function products(){
        //return $this->hasMany(Product::class,'cat_id'); // ถ้า tabale product fk ชือ cat_id
        return $this->hasMany(Product::class); // products tabel fk คือ category_id
    }
}
