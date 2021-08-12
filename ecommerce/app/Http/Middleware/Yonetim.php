<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Sentinel;


class Yonetim
{

     public function handle($request, Closure $next)
    {

      if (!Sentinel::check()) {
        return redirect()->route('yonetim.getoturumac');

    } else {

        if (Sentinel::inRole('sevilay')| Sentinel::inRole('nur')) {

            $onuser = Sentinel::getUser();
            view()->share('onuser', $onuser);
        } else {
            
            return redirect()->route('yonetim.getoturumac');

        }

    }

    return $next($request);
}
}