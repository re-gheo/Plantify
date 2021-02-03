<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }

        // if (Auth::user()->user_role == 'admin') {
        //     return redirect()->route('admin');
        // }

        // if (Auth::user()->user_role == 'customer') {
        //     return $next($request);
        // }

        // if (Auth::user()->user_role == 'retailer') {
        //     return redirect()->route('retailer');
        // }
    }
}
