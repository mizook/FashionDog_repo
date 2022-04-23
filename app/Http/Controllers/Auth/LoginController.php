<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $this->validate($request, [
            'rut' => 'required',
            'password' => 'required',
        ]);


        if (auth()->guard('administrator')->attempt([
            'rut' => $request->rut,
            'password' => $request->password,
        ])) {
            $user = auth()->user();

            return redirect()->intended(url('/AdminDashboard'));
        }

        if (auth()->guard('stylist')->attempt([
            'rut' => $request->rut,
            'password' => $request->password,
        ])) {
            $user = auth()->user();

            return redirect()->intended(url('/StylistDashboard'));
        }

        if (auth()->guard('client')->attempt([
            'rut' => $request->rut,
            'password' => $request->password,
        ])) {
            $user = auth()->user();

            return redirect()->intended(url('/ClientDashboard'));
        } else {
            return redirect()->back()->withError('El rut o la contraseña son incorrectos.');
        }
    }

    public function authenticated(Request $request, $client)
    {
        return redirect('/home');
    }
}
