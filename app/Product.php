<?php

namespace App;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Scopes\ActiveScope;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Sluggable,Searchable;
    use \Conner\Tagging\Taggable;
    protected $fillable = [
        'name',
        'origin',
        'desc_short',
        'desc',
        'quantity',
        'price_buy',
        'price_discount',
        'price_sell',
        'image',
        'active_discount',
        'category_id',
        'weight',
        'weight_unit',
        'active',
        
        
        ];
    protected $appends = [
        'TotalSales',
    ];
    
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
    
    public function searchableAs()
    {
        return 'products_index';
    }
    
    public function toSearchableArray()
    {
        $array =  [
            'id'      => $this->id,
            'name'    => $this->name,
            'category'=>$this->category->name
        ];

        // Customize array...

        return $array;
    }
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public function photo(){
        return $this->hasOne('App\Photo');  
    }
    public function images(){
        return $this->hasMany('App\Photo');  
    }
    public function reviews(){
        return $this->hasMany('App\Review');  
    }
    public function sales(){
        return $this->hasMany('App\Sale');  
    }
    
     public  function price(){
        if(($cart=Cart::content()->where('rowId',$this->id)->first())){
            if($cart->qty>100){
                return $this->price_discount;
            }
        }
         if ($this->active_discount){
            return $this->price_discount; 
         }
         return $this->price_sell; 
    }
    
    
    public function discount_percentage(){
        if ($this->price_sell==0){
            return 100;
        }
        return round(($this->price_sell-$this->price_discount)/$this->price_sell*100);
    }
    
    public function stars(){
        $stars_avg=0;
        $number=$this->reviews->count();
        if ($number>0){
            
            foreach($this->reviews as $review){
                $stars_avg=$review->star+$stars_avg;
            }
            
         $stars_avg= $stars_avg/($number)*100/5;
        }
        return round($stars_avg,0);
    }
    
    public function getTotalSalesAttribute(){
        // $total_sale=0;
        // foreach($this->sales as $sale){
        //     $total_sale=$total_sale+$sale->quantity;
        // }
        
        return $this->attributes['TotalSales']=$this->sales->sum('quantity');
    }
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function like(){
        $like=Like::where('product_id',$this->id)->where('customer_id',Auth::guard('customer')->user()->id)->first();
        if(empty($like)){
            return 0;
        }
        return 1;
    }
    
    public function properties(){
        return $this->belongsToMany('App\Property', 'product_property')->withPivot('name')->withoutGlobalScopes();
    }
    
    public function main_photo(){
        $photo=Photo::where('product_id',$this->id)->where('main_photo',1)->first();
        return $photo;
    }
    
    public function store(){
        return $this->belongsTo('App\Store');
    }
}
