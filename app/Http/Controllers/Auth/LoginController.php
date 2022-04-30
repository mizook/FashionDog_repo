<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function show()
    {
        if (auth()->guard()->check()) {
            return redirect('/');
        }

        return view('index');
    }

    public function login(LoginRequest $request)
    {
        $this->validate($request, [
            'rut' => 'required',
            'password' => 'required',
        ]);

        if (auth()->guard('administrator')->attempt(['rut' => $request->rut, 'password' => $request->password])) {

            $user = auth()->guard('administrator')->user();

            //dd($user);

            $request->session()->regenerate();

            auth()->guard('administrator')->login($user);

            return redirect()->intended(url('/AdminDashboard'));
        }

        if (auth()->guard('stylist')->attempt(['rut' => $request->rut, 'password' => $request->password])) {

            $user = auth()->guard('stylist')->user();
            $request->session()->regenerate();

            auth()->guard('stylist')->login($user);

            return redirect()->intended(url('/StylistDashboard'));
        }

        if (auth()->guard('client')->attempt(['rut' => $request->rut, 'password' => $request->password])) {

            $user = auth()->guard('client')->user();
            $request->session()->regenerate();

            auth()->guard('client')->login($user);

            //dd($user);

            return redirect()->intended(url('/ClientDashboard'));
        } else {
            return redirect()->back()->withError('El rut o la contraseña son incorrectos.');
        }
    }

    public function logout(Request $request)
    {
        $user = auth()->guard('administrator')->user();


        auth()->guard()->logout();

        session()->flush();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function authenticated(Request $request, $user)
    {
        return redirect('/home');
    }
}
