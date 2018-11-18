<?php

namespace App;

use App\Notifications\StoreResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Scopes\ActiveScope;
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
}
