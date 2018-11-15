<?php

namespace App\Http\Controllers;
use DB;
use App\Order;
use App\Customer;
use App\Transaction;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::orderBy('id','desc')->paginate(15);
        return view('admin.customers.index',compact('customers'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::with('addresses')->where('id',$id)->firstOrFail();
        $orders=$customer->orders;
        return view ('admin.orders.index',compact('orders','customer'));
        
      
    }
    
    public function show1($id)
    {

        
        $transactions=Transaction::where('customer_id',$id)->orderBy('id','desc')->get();
        
        return view('admin.transactions.index',compact('transactions'));
    }
    
    public function cart($id){
        $customer=Customer::where('id',$id)->firstOrFail();
        $cart= DB::table('shoppingcart')->where('identifier',$id)->first();
        if(empty($cart)){
            $cartContent=(object)[];
        }else{
            $cartContent=unserialize($cart->content);
        }
        
        // foreach ($cartContent as $cartItem) {
        //     return $cartItem->name;
        // }
       return view('admin.customers.cart',compact('cartContent','customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
}
