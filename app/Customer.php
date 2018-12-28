<?php

namespace App;

use App\Notifications\CustomerResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Morilog\Jalali\Facades\jDate;
class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'phone'
    ];
    // protected $appends = [
    //     'price',
    //     'month',
    //     'year',
    //     'RelativeMonth',
    //     'wet',
    //     'hot',
    //     'temper',
    //     'temperscore',
    //     'temperf',
    //     'contest',
    //     'temperphoto',
    // ];
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
        $this->notify(new CustomerResetPassword($token));
    }
    
    public function reviews(){
        return $this->hasMany('App\Review');  
    }
    
    
    
    public function addresses(){
        return $this->hasMany('App\Address');  
    }
    public function likes(){
        return $this->belongsToMany('App\Product','likes');
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }
    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
    public function promocodes()
    {
        return $this->belongsToMany('App\Promocode','promocode_customer')
            ->withPivot('used_at');
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
    
    public function getContestAttribute(){
        if(count($this->answers)==26){
            return $this->attributes['contest'] = 1;
        }
        return $this->attributes['contest'] = 0;
    }
    
    public function getHotAttribute(){
        $sum=0;
        $i=0;
        foreach($this->answers as $answer){
            
            if($answer->question->type==3){
                $i=$i+1;
                $sum=$sum+$answer->cold;
            }
        }
        $mean=$sum/$i;
        return $this->attributes['hot'] = $mean;
    }
    
    public function getWetAttribute(){
        $sum=0;
        $i=0;
        foreach($this->answers as $answer){
            
            if($answer->question->type==3){
                $i=$i+1;
                $sum=$sum+$answer->wet;
            }
        }
        $mean=$sum/$i;
        return $this->attributes['wet'] = $mean;
    }
    
    public function getTemperAttribute(){
        if($this->hot<=0.5 && $this->wet<=0.5){
            $temper='sodavi';
        }
        elseif($this->hot>=0.5 && $this->wet<=0.5){
            $temper='safravi';
        }
        elseif($this->hot>=0.5 && $this->wet>=0.5){
            $temper='damavi';
        }
        else{
            $temper='balghami';
        }
        return $this->attributes['temper'] = $temper;
    }
    
    public function getTemperscoreAttribute(){
        $sum=0;
        if($this->temper=='sodavi'){
            foreach($this->answers as $answer){
            
                if($answer->question->type!=3){
                    if($answer->sodavi==1){
                        $sum=$sum+1;
                    }
                }
            }
        }
        if($this->temper=='safravi'){
            foreach($this->answers as $answer){
            
                if($answer->question->type!=3){
                    if($answer->safravi==1){
                        $sum=$sum+1;
                    }
                }
            }
        }
        if($this->temper=='damavi'){
            foreach($this->answers as $answer){
            
                if($answer->question->type!=3){
                    if($answer->damavi==1){
                        $sum=$sum+1;
                    }
                }
            }
        }
        if($this->temper=='balghami'){
            foreach($this->answers as $answer){
            
                if($answer->question->type!=3){
                    if($answer->balghami==1){
                        $sum=$sum+1;
                    }
                }
            }
        }
        return $this->attributes['temperscore'] = $sum;
    }
    
    public function getTemperfAttribute(){
        
        if($this->temper=='sodavi'){
            $temperf='سوداوی';
        }
        if($this->temper=='safravi'){
            $temperf='صفراوی';
        }
        if($this->temper=='damavi'){
            $temperf='دموی';
        }
        if($this->temper=='balghami'){
            $temperf='بلغمی';
        }
        return $this->attributes['tempef'] = $temperf;
    }
    
     public function getTemperphotoAttribute(){
        
        if($this->temper=='sodavi'){
            $temperf='/photos/temper/sodavi.jpg';
        }
        if($this->temper=='safravi'){
            $temperf='/photos/temper/safravi.jpg';
        }
        if($this->temper=='damavi'){
            $temperf='/photos/temper/damavi.jpg';
        }
        if($this->temper=='balghami'){
            $temperf='/photos/temper/balghami.jpg';
        }
        return $this->attributes['temperphoto'] = $temperf;
    }
    
    public function answers(){
        return $this->belongsToMany('App\Answer', 'customer_answer');
    }
}
