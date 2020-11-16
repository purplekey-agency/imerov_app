<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Subtype
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

        if(Auth::user()->subscription_type === 0){
            return \redirect()->route('selectsub');
        }

        return $next($request);
    }
}
