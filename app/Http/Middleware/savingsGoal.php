<?php

namespace App\Http\Middleware;

use App\Target;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class savingsGoal
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

        $goals = Target::where("unique_id",Auth::user()->unique_id)->get();

        if(count($goals) < 0){
            return Redirect::route("createTarget")->with("message","You need to first create a goal to proceed")
                ->with("type","info");
        }
        return $next($request);
    }
}
