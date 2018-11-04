<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =   ['name'];
    public function photos(){
        return $this->morphMany('App\Model\Photo','photoable');
    }
}
