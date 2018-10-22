<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
