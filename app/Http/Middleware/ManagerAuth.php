<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ManagerAuth
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
        if (Auth::guest() OR $request->user() && $request->user()->user_account_type != 2 && $request->user()->user_account_type != 3)
        {
            return redirect('/unauthorized');
        }
        return $next($request);
    }
}
