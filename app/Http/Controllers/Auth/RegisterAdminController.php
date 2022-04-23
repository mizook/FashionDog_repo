<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Administrator;

class RegisterAdminController extends Controller
{
    public function show()
    {
        return view('auth.registerAdmin');
    }

    public function register(Request $request)
    {
        //dd($request);
        $admin = Administrator::create($request);
        return redirect('/login')->with('success', 'Account created successfully');
    }
}
