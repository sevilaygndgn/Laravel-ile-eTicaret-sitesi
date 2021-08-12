<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Sentinel;

class User
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
        if ($user = Sentinel::check())
        {
            $loginuser = Sentinel::getUser();
            view()->share('loginuser',$loginuser);

                return $next($request);
        }
        else
        {
            return redirect()->route('site.getLogin');

        }
    }
}

