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

        if (auth()->guard('client')->attempt([
            'rut' => $request->rut,
            'password' => $request->password,
        ])) {
            $user = auth()->user();

            return redirect()->intended(url('/home'));
        } else {
            return redirect()->back()->withError('Credentials doesn\'t match.');
        }
    }

    public function authenticated(Request $request, $client)
    {
        return redirect('/home');
    }
}
