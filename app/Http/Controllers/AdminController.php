<?php

namespace Sembako\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getHome()
    {
    	dd(Auth::user()->roles->first()->nama);
    	return view('backarea.home');
    }
}
