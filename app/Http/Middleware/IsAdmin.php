<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdmin
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
        if(Auth::User() && (Auth::User()->type_of_user == 1 || Auth::User()->type_of_user == 2)){
            return redirect('/admin/dashboard');
        }
        else{
            return $next($request);
        }

    }
}
