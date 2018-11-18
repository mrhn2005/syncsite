<?php

namespace App\Http\Controllers;
use App\Store;
use App\Province;
use Illuminate\Http\Request;
use App\Notifications\StoreNotification;
use App\Scopes\ActiveScope;

class AdminStoreController extends Controller
{
    
    public function index(){
        $stores=Store::withoutGlobalScopes()->with('products')->get();
        // return $stores;
        return view('admin.stores.index',compact('stores'));
    }
    
    public function edit(Store $store){
        $provinces=Province::all();
        return view('admin.stores.edit',compact('store','provinces'));
    }
    
    
    public function notification(Store $store){
        return view('admin.stores.message',compact('store'));
    }
    
    public function send_notification(Request $request, Store $store){
        // dd($request->message);
        $store->notify(new StoreNotification($request->message,$request->product_id));
        
        return back()->with(['success'=>'
            پیام با موفقیت ارسال شد.
        ']);
    }
}
