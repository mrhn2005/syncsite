<?php

namespace App;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Scopes\ActiveScope;
class Category extends Model
{
    
    use Sluggable, NodeTrait{
        Sluggable::replicate insteadof NodeTrait;
    }
    
    protected $fillable = [
        'name','photo'

        ];
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
        
    
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
