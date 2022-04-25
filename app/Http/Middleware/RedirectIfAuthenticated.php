<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        //$guards = empty($guards) ? [null] : $guards;

        $guards = ['administrator', 'client', 'stylist'];

        if (auth()->guard('administrator')->check()) {
            return redirect('/AdminDashboard');
        }
        if (auth()->guard('stylist')->check()) {
            return redirect('/StylistDashboard');
        }
        if (auth()->guard('client')->check()) {
            return redirect('/ClientDashboard');
        }

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         //return redirect(RouteServiceProvider::HOME);
        //         return redirect('/');
        //     }
        // }

        return $next($request);
    }
}
