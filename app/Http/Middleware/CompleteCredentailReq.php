<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompleteCredentailReq
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    //    dd(1);
        if (Auth::user()->govtid_number == null && Auth::user()->birthday == null) {
            Auth::logout();
           
            
            return redirect()->route("store")->with('success',"Please Complete your credentials");
        }else{
         
            return $next($request);
        }
    
    }
}
