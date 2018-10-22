<?php

namespace App;
use Morilog\Jalali\Facades\jDate;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $appends = [
        'price',
        'month',
        'year',
        'RelativeMonth'
    ];
    
    protected $guarded = []; 
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    
     public function address(){
        return $this->belongsTo('App\Address');
    }
    
    public function sales(){
        return $this->hasMany('App\Sale');
    }
    
    public function getPriceAttribute(){
        return $this->attributes['price'] = filter_var($this->total_price,FILTER_SANITIZE_NUMBER_INT);
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
