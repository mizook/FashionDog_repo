<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\RegisterAdminRequest;
use App\Models\Administrator;

class RegisterAdminController extends Controller
{
    public function show()
    {
        return view('auth.registerAdmin');
    }

    public function register(RegisterAdminRequest $request)
    {
        //dd($request);
        $admin = Administrator::create($request->validated());
        return redirect('/login')->with('success', 'Account created successfully');
    }

    public function showTestPage()
    {
        return view('dashboards.testpage');
    }
}
