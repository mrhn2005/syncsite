<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
     public function delivery(){
        return $this->belongsTo('App\Delivery');
    }
}
