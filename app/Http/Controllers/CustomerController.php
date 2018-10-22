<?php

namespace App\Http\Controllers;
use App\Order;
use App\Promocode;
use App\Product;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CustomerController extends Controller
{
    public function show(){
        return view('customer');
    }
    
    public function free(){
        $products=Product::where('free',1)->where('quantity','>',0)->paginate(12);
        return view('free',compact('products'));
    }
    
    public function edit_profile(Request $request){
        $id=Auth::guard('customer')->user()->id;
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
        ]);
        $customer=Customer::where('id',$id)->firstOrFail();
        $customer->update($request->all());
        return redirect()->back()->with([
            'success'=>'
            به روز رسانی مشخصات با موفقیت انجام شد.
            '
            ]);
        
    }
    public function favorites(){
        $id=Auth::guard('customer')->user()->id;
        $customer=Customer::where('id',$id)->firstOrFail();
        $products=$customer->likes;
        return view('customer',compact('products'));
    }
    public function orders(){
        $id=Auth::guard('customer')->user()->id;
        $customer=Customer::where('id',$id)->firstOrFail();
        $orders=$customer->orders;
        return view('customer',compact('orders'));  
    }
    
    public function orders_show($order_id){
         $id=Auth::guard('customer')->user()->id;
        $order=Order::where('id',$order_id)->firstOrFail();
        if($order->customer->id==$id){
            return view('customer',compact('order'));
        }
        return redirect()->back();
    }
    
    public function addresses(){
        $id=Auth::guard('customer')->user()->id;
        $customer=Customer::where('id',$id)->firstOrFail();
        $addresses=$customer->addresses;
        return view('customer',compact('addresses'));  
    }
    
    public function check_code(Request $request){
        
        $code=$request->code2;
        
        $promocode = Promocode::where('code',$code)->first();
      
        // $promocode->customers()->attach( Auth::guard('customer')->user()->id);
        if ($promocode === null) {
            return response()->json(['error' => '
            کد وارد شده اشتباه است.
            '], 404);
            // return '
            // کد وارد شده اشتباه است.
            // ';
        }
        if($promocode->isExpired()){
            return response()->json(['error' => '
            این کد منقضی شده است.
            '], 404);
        }
        $customer=Customer::where('id',Auth::guard('customer')->user()->id)->firstOrFail();
        if(count($customer->orders)>0 && $promocode->first_use){
             return response()->json(['error' => '
            این کد فقط برای اولین خرید قابل استفاده می باشد.
            '], 404);
        }
        if($promocode->uses>=$promocode->max_uses_user){
            return response()->json(['error' => '
            متاسفانه ظرفیت استفاه از این کد تمام شده است.
            '], 404);
        }
        
        if($promocode->customers()->wherePivot('customer_id', Auth::guard('customer')->user()->id)->exists()){
          return response()->json(['error' => '
           شما قبلا از این کد استفاده کرده اید.
            '], 404);  
        }
        $amount = str_replace(',', '', Cart::subtotal());
        if ($promocode->is_fixed){
            if ($amount<$promocode->order_amount){
                 return response()->json(['error' => '
                    حداقل مبلغ خرید مورد نیاز برای این کد تخفیف
            '.$promocode->order_amount.'
                تومان می باشد.
            '], 404);  
            }
            $discount= $promocode->discount_amount;
        }else
        {
            if ($amount>$promocode->order_amount){
                $discount= $promocode->discount_amount*$promocode->order_amount/100;
            }
            else{
               $discount= $promocode->discount_amount*$amount/100; 
            }
            
            // $arr = str_split($subtotal, "3"); // break string in 3 character sets
            // $price_new_text = implode(",", $arr); 
            
        }
        $subtotal=$amount-$discount;
        // $price_new_text=number_format($subtotal);
        $price_new_text=($subtotal);
            return ['discount'=>$discount,'subtotal'=>$price_new_text];
            
        
        
    }
    
}
