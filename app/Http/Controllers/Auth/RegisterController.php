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
        //dd($request);
        $client = Client::create($request->validated());

        auth()->guard('client')->login($client);
        return redirect('/ClientDashboard')->with('success', 'Account created successfully');

        //return redirect('/')->with('success', 'Account created successfully');
    }
}
