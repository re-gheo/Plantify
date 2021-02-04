<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Customer
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
        if(Auth::user()->user_role == 'customer'||Auth::user()->user_role == 'retailer' ){
            return $next($request);

        }else 
        abort(403, "Cannot access to restricted page");
    }
    
}
