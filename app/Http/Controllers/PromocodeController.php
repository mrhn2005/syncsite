<?php

namespace App\Http\Controllers;

use App\Promocode;
use Illuminate\Http\Request;
use Gabievi\Promocodes\Traits\Rewardable;
use Gabievi\Promocodes\Facades\Promocodes;


class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes=Promocode::orderBy('id','desc')->get();
        return view('admin.code.index',compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.code.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Promocodes::create($amount = 1, $reward = null, [],$request->expires_at ,false, $request->is_fixed,$request->discount_amount,$request->order_amount,$request->max_uses_user,$request->max_uses,$request->first_use);
        return redirect()->route('promocode.index')->with(['success'=>'
                کد تخفیف با موفقیت ثبت شد.
                 '
                     ]);
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function show(Promocode $promocode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function edit(Promocode $promocode)
    {
        return view('admin.code.edit',compact('promocode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocode $promocode)
    {
        $promocode->update($request->all());
        return redirect()->route('promocode.index')->with(['success'=>'
                کد تخفیف با موفقیت تغییر کرد.
                 '
                     ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocode $promocode)
    {
        
        $promocode->delete();
        return redirect()->route('promocode.index')->with(['success'=>'
                کد تخفیف با موفقیت حذف شد.
                 '
                     ]);
    }
}
