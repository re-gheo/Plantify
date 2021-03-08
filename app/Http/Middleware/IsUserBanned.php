<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth, Session;

class IsUserBanned
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
        if(Auth::user()->user_stateid == 2){
            Auth::logout();
            abort(403, "Cannot access to restricted page");
        }
        else{
            return $next($request);
        }

    }
}
