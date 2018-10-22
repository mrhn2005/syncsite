<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahalisaz extends Model
{
    protected $fillable=['name','location','phone','biography','spec','property','price','weight'];
    
    // protected $guarded = [];
    
    public function photos(){
        return $this->hasMany('App\MahalisazPhoto');
    }
}
