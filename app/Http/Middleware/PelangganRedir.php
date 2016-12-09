<?php

namespace Sembako\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PelangganRedir
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
            if (Auth::user()->roles->first()->nama == 'Pelanggan') {
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
