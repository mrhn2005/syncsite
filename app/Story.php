<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Story extends Model
{
   use Sluggable;
   use \Conner\Tagging\Taggable;
   protected $guarded=['tags'];
   public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'subject'
            ]
        ];
    }
    
    public function reviews(){
        return $this->hasMany('App\Comment');
    }
}
