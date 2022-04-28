<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if (auth()->guard('administrator')->user()) {
            return '/AdminDashboard';
        }
        if (auth()->guard('stylist')->user()) {
            return '/StylistDashboard';
        }
        if (auth()->guard('client')->user()) {
            return '/ClientDashboard';
        }
        if (Auth::user() == null) {
            return '/';
        }
        // if (!$request->expectsJson()) {
        //     return view('index');
        // }
    }
}
