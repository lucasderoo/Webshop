<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerAuth
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
        if (Auth::guest() OR $request->user() && $request->user()->user_account_type < 1 && $request->user()->user_account_type > 3)
        {
            return redirect('/unauthorized'); // change later
        }
        return $next($request);
    }
}
