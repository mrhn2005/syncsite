<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Maincat extends Model
{
    // protected $guarded=[];
    
    use Sluggable;
    public function categories(){
      return  $this->hasMany('App\Category','maincat_id');
    }
     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\Category');
    }
}
