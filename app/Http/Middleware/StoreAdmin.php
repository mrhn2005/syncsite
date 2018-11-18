<?php

namespace App\Http\Middleware;

use Closure;
use App\Product;
use Illuminate\Support\Facades\Auth;
class StoreAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
	        return $next($request);
	    }
        if (Auth::guard('store')->check()) {
            
            if(isset($request->product_id)){
                
                   $product=Product::withoutGlobalScopes()->findOrFail($request->product_id);
                   if($product->store->id==Auth::guard('store')->user()->id){
                       
                       return $next($request);
                   }else{
                       
                       return redirect('store/home');
                   }
            }elseif(isset($request->store)){
                    if($request->store->id==Auth::guard('store')->user()->id){
                       
                       return $next($request);
                   }else{
                       
                       return redirect('store/home');
                   }
            }
	        return redirect('store/home');
	    }

	    return $next($request);
    }
}
