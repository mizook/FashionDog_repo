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
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        //dd($request);
        $client = Client::create($request->validated());
        return redirect('/login')->with('success', 'Account created successfully');
    }
}
