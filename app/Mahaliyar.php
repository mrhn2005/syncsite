<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahaliyar extends Model
{
    protected $fillable=['name','location','phone','biography','spec','property','how'];
    public function photos(){
        return $this->hasMany('App\MahaliyarPhoto');
    }
}
