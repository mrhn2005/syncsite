<?php

namespace App\Http\Controllers;
use App\Order;
use App\Sale;
use App\Promocode;
use App\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $new_quantity=$sale->product->quantity+$sale->quantity-$request->quantity;
        if($new_quantity<0){
                     return redirect()->back()->with(["fail"=>
                "
                متاسفانه موجودی
                ".$sale->product->name."
                فقط
                ".($sale->product->quantity+$sale->quantity)."
                عدد است.
                "
                ]);
            }
        $sale->product->quantity=$new_quantity;
        $sale->product->update();
        $sale->quantity=$request->quantity;
        $sale->price=$request->price;
        $sale->update();
        $this->total_price($sale);
        
        return redirect()->back()->with(['success'=>'
        تغییرات با موفقیت ذخیره شد.
        ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->product->quantity=$sale->product->quantity+$sale->quantity;
        $sale->product->update();
        $sale->delete();
        $this->total_price($sale);
        return redirect()->back();
    }
    
    
    public function add_product(Request $request, $id){
        $product=Product::where('id',$id)->first();
        if($product->quantity<1){
            return redirect()->back()->with(['fail'=>
            'متاسفانه این محصول موجود نیست.'
            ]);
        }
        $sale=new Sale;
        $sale->order_id=$request->order_id;
        $sale->customer_id=$request->customer_id;
        $sale->product_id=$id;
        $sale->quantity=1;
        $sale->price=$product->price();
        $sale->price_buy=$product->price_buy;
        $sale->discount=$product->active_discount;
        $sale->save();
        $this->total_price($sale);
        return redirect()->back()->with(['success'=>'
        تغییرات با موفقیت ذخیره شد.
        ']);
        
        
    }
    
    
    private function total_price($sale){
        $order=Order::where('id',$sale->order_id)->first();
        $total_price=0;
        foreach($order->sales as $sale){
            $total_price=$total_price+$sale->quantity*$sale->price;
        }
        $discount=0;
        if(!empty($order->promocode)){
            $promocode=Promocode::Where('code',$order->promocode)->first();
            if ($promocode->is_fixed){
                $discount= $promocode->discount_amount;
            }else
            {
                if ($total_price>$promocode->order_amount){
                    $discount= $promocode->discount_amount*$promocode->order_amount/100;
                }
                else{
                   $discount= $promocode->discount_amount*$total_price/100; 
                }
            }
            
        }
       
        $subtotal=$total_price-$discount;
        
        
        $order->total_price=$subtotal;
        $order->discount=$discount;
        $order->update();
    }
}
