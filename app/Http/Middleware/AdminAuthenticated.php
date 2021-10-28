<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check())
        {
            // if user is not admin, take them to dashboard
            if (Auth::user()->isUser())
            {
              return redirect( route('dashboard'));
            }

            else if (Auth::user()->isAdmin())
            {
                return $next($request);
            }
        }

        abort(404); //throw 404 error for other users
    }
}
