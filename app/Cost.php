<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $guarded=[];
    
    
    public function cost_type(){
        return $this->belongsTo('App\CostType');
    }
}
