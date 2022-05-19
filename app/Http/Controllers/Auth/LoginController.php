<?php

namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Client;
use App\Models\Stylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Rules\RutValidator;

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
        $request->validated();

        if (auth()->guard('administrator')->attempt(['rut' => $request->rutLogin, 'password' => $request->passwordLogin])) {

            $user = auth()->guard('administrator')->user();

            //dd($user);

            $request->session()->regenerate();

            auth()->guard('administrator')->login($user);

            return redirect()->intended(url('/admin'));
        }

        if (auth()->guard('stylist')->attempt(['rut' => $request->rutLogin, 'password' => $request->passwordLogin])) {

            $stylist = Stylist::where('rut', $request->rutLogin)->first();
            if ($stylist->status == 0) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->back()->with('disabledUser', 'msg');
            }

            $user = auth()->guard('stylist')->user();
            $request->session()->regenerate();
            auth()->guard('stylist')->login($user);

            return redirect()->intended(url('/estilista'));
        }

        if (auth()->guard('client')->attempt(['rut' => $request->rutLogin, 'password' => $request->passwordLogin])) {

            $client = Client::where('rut', $request->rutLogin)->first();
            if ($client->status == 0) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->back()->with('disabledUser', 'msg');
            }

            $user = auth()->guard('client')->user();
            $request->session()->regenerate();
            auth()->guard('client')->login($user);

            return redirect()->intended(url('/cliente'));
        } else {
            return redirect()->back()->with('loginError', 'Las credenciales de acceso son incorrectas o el usuario no esta registrado en el sistema.');
        }
    }

    public function logout(Request $request)
    {
        $user = auth()->guard('administrator')->user();


        auth()->guard()->logout();

        session()->flush();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('logoutMessage', '¡Sesión finalizada con exito!');
    }

    public function authenticated(Request $request, $user)
    {
        return redirect('/home');
    }
}
