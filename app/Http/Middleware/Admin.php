<?php

namespace App\Http\Middleware;

use Closure;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

/**
 * Class Admin
 * @package App\Http\Middleware
 */
class Admin
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
       // dd($request->user());
       // return $next($request);
        //if (Auth::user()) {
        //    if (Auth::user()->hasRole('admin')) {
                return $next($request);
        //    }
      //  }

       // return redirect('/');
    }
}
