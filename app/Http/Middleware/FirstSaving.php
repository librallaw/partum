<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FirstSaving
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
        if(empty(Auth::user()->authorization_code)){

            return Redirect::route("showDashboard")->with("message","You need to make your first saving to proceed")
                ->with("type","info");

        }

        return $next($request);
    }
}
