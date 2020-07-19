<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::user()->username == 'Admin')
        {
            return $next($request);
        }

        else {
            return redirect('/home')->with('status', 'YOU ARE NOT ALLOWED TO ACCESS ADMIN DASHBOARD');
        }
        //return $next($request);
    }
}
