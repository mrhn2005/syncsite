<?php

namespace App;

use App\Notifications\StoreResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Scopes\ActiveScope;
use Morilog\Jalali\Facades\jDate;
class Store extends Authenticatable
{
    use Notifiable;
    use Sluggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password'
    // ];
    
    protected $guarded=[];
    
    protected $appends = [
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StoreResetPassword($token));
    }
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function products(){
        return $this->hasMany('App\Product')->withoutGlobalScopes();
    }
    
    public function visible(){
        return $this->hasMany('App\Product');
    }
    
    public function city(){
        return $this->belongsTo('App\City');
    }
    
    public function getPhotoAttribute($value)
    {
        if($value){
            return '/photos/stores/'.$value;
        }
        return $value;
    }
    
    public function categories(){
        $categories=$this->visible()->with('category')->get()->pluck('category')->unique('id')->values();
        
        return $categories;
    }
    
    
    public function reviews()
    {
        return $this->hasManyThrough('App\Review', 'App\Product')->with(['product','customer']);
    }
    
    public function getMonthAttribute(){
        return $this->attributes['month'] = jDate::forge($this->created_at)->format('%m');
    }
    
    public function getYearAttribute(){
        return $this->attributes['year'] = jDate::forge($this->created_at)->format('%Y');
    }
    public function getRelativeMonthAttribute(){
        return $this->attributes['RelativeMonth'] = $this->month+$this->year*12;
    }

}
