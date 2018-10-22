<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CustomerAuth
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
        if(!Auth::guard('customer')->check()){
             return redirect()->route('home');
        }
        
        if(Auth::guard('customer')->user()->id != $request->id)
        {
           return redirect()->route('home');
        
        }
        
        return $next($request);
    }
}
