<?php

namespace App\Http\Middleware;

use App\Banks;
use Closure;

class Bank
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
        $bank = Banks::where("unique_id",Auth::user()->unique_id)->first();

        if(count($bank) < 1){
            return redirect()->route("showProfile")->with("message","No bank account found, You need to add your bank details before you can withdraw")->with("type","danger"); exit;

        }

        return $next($request);
    }
}
