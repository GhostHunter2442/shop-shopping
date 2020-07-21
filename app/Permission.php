<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
   protected $table = 'model_has_permissions';
    protected $primaryKey = 'model_id';
   public $incremmenting = false;
    public $timestamps = false;
}
