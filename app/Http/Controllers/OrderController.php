<?php

namespace App\Http\Controllers;
use App\Address;
use App\Order;
use Illuminate\Http\Request;
use App\Promocode;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders =Order::with('customer')->orderBy('delivered','asc')->orderBy('id','desc')->paginate(15);
        return view ('admin.orders.index',compact('orders'));
        
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->opened=1;
        $order->save();
        return view('admin.orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->phone=$request->phone;
        
        $order->address=$request->address;
        $order->update();
        return redirect()->route('orders.index')->with(['success'=>'
            تغییرات با موفقیت ذخیره شد.
            ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        foreach ($order->sales as $item){
            $item->product->quantity=$item->product->quantity+$item->quantity;
            $item->product->update();
            $item->delete();
        }
         if(!empty($order->promocode)){
            $promocode=Promocode::Where('code',$order->promocode)->first();
            $promocode->customers()->detach($order->customer->id);
            // $order->customer->promocodes()->detach($promocode->id);
         }
        
        $order->delete();
        return redirect()->back()->with(['success'=>'
            سفارش با موفقیت حذف شد.
        ']);
    }
    public function update_delivery(Request $request, Order $order){
        
        $order->delivered=1;
        $order->save();
        return redirect()->back()->with(['success'=>'
        وضعیت سفارش به تحویل داده شده تغییر پیدا کرد
        ']);
        
    }
    
    public function update_payed(Request $request, Order $order){
        
        $order->payed=1;
        $order->save();
        return redirect()->back()->with(['success'=>'
        وضعیت پرداخت تغییر کرد.
        ']);
        
    }
    
    
}
