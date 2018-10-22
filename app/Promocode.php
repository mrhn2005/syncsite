<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Promocode extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function isExpired()
    {
        // return $this->expires_at ? Carbon::now()->gte($this->expires_at) : false;
        // return diffInDays(Carbon::now(),Carbon::parse($this->expires_at))<0 ? true : false;
        // return Carbon::parse($this->expires_at)->gte(Carbon::now());
        return Carbon::parse($this->expires_at) ? Carbon::now()->gte(Carbon::parse($this->expires_at)) : 0;
    }
    
     public function customers()
    {
        return $this->belongsToMany('App\Customer','promocode_customer')
            ->withPivot('used_at');
    } 
    
    
    // public function isValid(){
        
        
    //     if($this->isExpired()){
    //         return response()->json(['error' => '
    //         این کد منقضی شده است.
    //         '], 404);
    //     }
    //     if($this->uses>=$this->max_uses_user){
    //         return response()->json(['error' => '
    //         متاسفانه ظرفیت استفاه از این کد تمام شده است.
    //         '], 404);
    //     }
        
    //     if($this->customers()->wherePivot('customer_id', Auth::guard('customer')->user()->id)->exists()){
    //       return response()->json(['error' => '
    //       شما قبلا از این کد استفاده کرده اید.
    //         '], 404);  
    //     }
    // }
}
