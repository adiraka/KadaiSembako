<?php

namespace Sembako\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRedir
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
        if (Auth::check()) {
            if (Auth::user()->roles->first()->nama == 'Admin') {
                return redirect()->route('adminHome');
            }
        }
        return $next($request);
    }
}
