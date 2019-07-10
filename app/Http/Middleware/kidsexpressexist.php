<?php

namespace App\Http\Middleware;

use App\Kidsexpress;
use Closure;
use Illuminate\Support\Facades\Auth;

class kidsexpressexist
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

        $kids = Kidsexpress::where("unique_id",Auth::user()->unique_id)->get();

        if(count($kids) < 1){

            return redirect()->route("showCreateExpress")->with("message","Please use the form to create accounts for your kid(s)")->with("type",'info');
        }
        return $next($request);
    }
}
