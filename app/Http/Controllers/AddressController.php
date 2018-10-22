<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
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
        $id=Auth::guard('customer')->user()->id;
        // return $request->address;
        if($id==$request->customer_id){
            $address= new Address;
            $address->name=$request->address;
            $address->customer_id=$request->customer_id;
            $address->delivery_id=$request->region_id;
            $address->save();
            
        }
        $a[0]=view('includes.main-cart')->render();
        $a[1]=view('includes.addresses')->render();
        return $a;
        
    }
    public function store1(Request $request)
    {
        // return $request->address;
        $id=Auth::guard('customer')->user()->id;
        $this->validate($request, [
            'name' => 'required',
            
        ]);
        $address= new Address;
        $address->name=$request->name;
        $address->customer_id=$id;
        $address->delivery_id=$request->region_id;
        $address->save();
        return redirect()->back()->with([
            'success'=>'
            آدرس با موفقیت افزوده شد.
            '
            ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$address_id)
    {
        $id=Auth::guard('customer')->user()->id;
        $address=Address::where('id',$address_id)->firstOrFail();
        // return $address->name;
        if ($address->customer->id==$id){
           $address->name=$request->name;
           $address->delivery_id=$request->region_id;
            $address->update();
            return redirect()->back()->with([
                'success'=>'
                به روز رسانی مشخصات با موفقیت انجام شد.
                '
                ]); 
        }
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($address_id)
    {
        $id=Auth::guard('customer')->user()->id;
        $address=Address::where('id',$address_id)->firstOrFail();
        if ($address->customer->id==$id){
            $address->delete();
            return redirect()->back()->with([
                'success'=>'
              آدرس با موقیت حذف شد.
                '
            ]);
        }
       return redirect()->back(); 
    }
}
