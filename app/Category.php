<?php

namespace App;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    
    use Sluggable, NodeTrait{
        Sluggable::replicate insteadof NodeTrait;
    }
    
    protected $fillable = [
        'name','photo'

        ];
    public function products(){
        return $this->hasMany('App\Product');  
    }
    
    public function maincat(){
        return $this->belongsTo('App\Maincat');
    }
    
    public function properties(){
        return $this->belongsToMany('App\Property', 'category_property');
    }

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
