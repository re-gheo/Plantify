<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;

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
        if (Auth::user()) {
            if (Auth::user()->user_role == 'customer' || Auth::user()->user_role == 'retailer') {
                return $next($request);
            }
        } else
            return redirect()->route('loginf')->with('success', 'you need to login first as a customer.');
    }
}
