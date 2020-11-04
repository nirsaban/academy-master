<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAuthEmploer
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
        if(Auth::check()){
        if (Auth::user()->role != 'employer') {
            return redirect('/');
        }else{
            return $next($request);
        }
     }else{
        return redirect('/');
    }
    }
}
