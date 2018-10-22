<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function add(Request $request){
        // Cart::destroy();
        
        $product=Product::find($request->id);
        
        if((Cart::get($product->id))!="empty"){
            $quantity=Cart::get($request->id)->qty;
            
            if($product->quantity<=$quantity){
                return ["out_of_quantity"=>
                "
                متاسفانه تعداد موجودی کافی نیست.
                "];
            }   
        }
        if(isset($request->free_buy)){
            $carting=Cart::search(function ($cartItem, $rowId) {
           
                	return $cartItem->price == 0;
                });
                 $carting->count();
            if($carting->count()>4){
               return ["out_of_quantity"=>
                "
                شما بیش از 5 محصول رایگان نمی توانید انتخاب نمایید.<br><a href='/cart'>برو به سبد خرید</a>
                "]; 
            }
          $cart=Cart::add($product->id, $product->name, 1, 0);
          Cart::update($cart->rowId, ['price' => 0, 'qty' => 1]);
        }else{
          Cart::add($product->id, $product->name, 1, $product->price());
        }
        
        if (Auth::guard('customer')->check()){
            Cart::delete_cart(Auth::guard('customer')->user()->id);
            Cart::store(Auth::guard('customer')->user()->id);
        }
        $address_id=$request->address_id; 
        $a[0]=view('includes.mini-cart')->render();
        if (empty($request->cart)){
            $a[1]=$request->cart;
            $a[2]=$request->cart;
        }else{
            
            $a[1]=view('includes.main-cart',compact('address_id'))->render();
            if(Auth::guard('customer')->check()){
               $a[2]=view('includes.addresses',compact('address_id'))->render(); 
            }else{
                $a[2]=$request->cart;
            }
            
        }
        
        
        return $a;
        // return view('includes.mini-cart')->with('a1'=>$a1);
    }

    public function remove(Request $request){
           
          $product=Product::find($request->id);
          if((Cart::get($product->id))!="empty"){
              if($request->qty==1){
                    Cart::remove($request->rowId);
                }else{
                  Cart::update($product->id, $request->qty-1); 
                }
                  // Will update the quantity 
    
               $address_id=$request->address_id;
                if (Auth::guard('customer')->check()){
                    Cart::delete_cart(Auth::guard('customer')->user()->id);
                    Cart::store(Auth::guard('customer')->user()->id);
                }
              
          }
            
            

           $a[0]=view('includes.mini-cart')->render();
        if (empty($request->cart)){
            $a[1]=$request->cart;
            $a[2]=$request->cart;
        }else{
            $a[1]=view('includes.main-cart',compact('address_id'))->render();
            if(Auth::guard('customer')->check()){
               $a[2]=view('includes.addresses',compact('address_id'))->render(); 
            }else{
                $a[2]=$request->cart;
            }
        }
        
        return $a;
          
         
    }
    public function delete(Request $request){
           
          $product=Product::find($request->id);
            if((Cart::get($product->id))!="empty"){
                Cart::remove($request->rowId);

                if (Auth::guard('customer')->check()){
                    Cart::delete_cart(Auth::guard('customer')->user()->id);
                    Cart::store(Auth::guard('customer')->user()->id);
                } 
            }
           
            
            $address_id=$request->address_id;
           $a[0]=view('includes.mini-cart')->render();
        if (empty($request->cart)){
            $a[1]=$request->cart;
            $a[2]=$request->cart;
        }else{
            $a[1]=view('includes.main-cart',compact('address_id'))->render();
            if(Auth::guard('customer')->check()){
               $a[2]=view('includes.addresses',compact('address_id'))->render(); 
            }else{
                $a[2]=$request->cart;
            }
        }
        
        // return $a2;
        return $a;
          
         
    }
}
