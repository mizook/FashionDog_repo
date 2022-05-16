<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;


class RegisterController extends Controller
{
    public function show()
    {
        if (auth()->guard()->check()) {
            return redirect('/');
        }

        return view('index');
    }

    public function register(RegisterRequest $request)
    {
        $request->validated();

        $rutCorrecto = preg_replace('/[\.\-]/i', '', $request->rut);
        $request->rut = $rutCorrecto;

        $client = Client::create([
            'rut' => $rutCorrecto,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        $client->save();

        auth()->guard('client')->login($client);

        return redirect('/cliente')->with('clientCreated', 'Cuenta creada correctamente.');
    }
}
