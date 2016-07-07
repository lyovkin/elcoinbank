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
        if (Auth::user()) {
            if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('supervisor')) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
