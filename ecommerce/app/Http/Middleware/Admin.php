<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Sentinel;
class Admin
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

      if (!Sentinel::check()) {
        return redirect()->route('yonetim.getadmin');

    } else {

        if (Sentinel::inRole('admin')) {

            $onuser = Sentinel::getUser();
            view()->share('onuser', $onuser);
        } else {
            dd('test');
            return redirect()->route('yonetim.getadmin');

        }

    }

    return $next($request);
}
}