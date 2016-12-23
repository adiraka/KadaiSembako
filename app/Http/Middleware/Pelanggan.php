<?php

namespace Sembako\Http\Middleware;

use Auth;
use Session;
use Closure;

class Pelanggan
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
        if (!Auth::check()) {
            Session::flash('alert', 'Anda harus login untuk melanjutkannya!');
            return redirect()->route('login');
        } else {
            if (Auth::user()->roles->first()->nama != 'Pelanggan') {
                Session::flash('alert', 'Anda harus login untuk melanjutkannya!');
                return redirect()->route('login');
            }
        }
        return $next($request);
    }
}
