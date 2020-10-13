<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserIsConfirmed
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
        if (!Auth::User()->verified())
        {
            dd("here");
        }

        return $next($request);
    }
}
