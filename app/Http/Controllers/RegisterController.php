<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;

use App\Providers\RouteServiceProvider; //JUNTO CON ESTO

class RegisterController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME; //ESTO ESTÁ DE PRUEBA, A VER SI ME REDIRECCIONA LUEGO DE REGISTRARME

    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $client = Client::create($request->validated());
    }
}
