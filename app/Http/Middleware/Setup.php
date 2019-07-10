<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Setup
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
        
        if(Auth::user()->setup == 0){
            return redirect()->route("setup");
        }

        if(Auth::user()->setup == 1){
            return redirect()->route("showFirstPayment");
        }
        return $next($request);
    }
}
