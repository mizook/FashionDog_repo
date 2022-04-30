<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Models\Administrator;
use App\Models\Stylist;
use App\Models\Client;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client,administrator,stylist', ['except' => 'logout']);
    }

    public function show()
    {
        return view('dashboards.changePassword');
    }
    public function update(Request $request, $rut)
    {
        $request->validate([
            'password' => ['required', 'min:10', 'max:15'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        //dd($request->confirm_password);

        if (auth()->guard('administrator')->user()) {

            //dd($rut);
            $admin = Administrator::where('rut', $rut)->FirstOrFail();

            $admin->password = $request->password;

            $admin->save();

            //hacemos logout luego de cambiar la clave
            $logC = new LoginController();
            $logC->logout($request);

            return redirect()->intended(url('/admin'));
        }


        if (auth()->guard('stylist')->user()) {

            //dd($rut);
            $stylist = Stylist::where('rut', $rut)->FirstOrFail();

            $stylist->password = $request->password;

            $stylist->save();

            //hacemos logout luego de cambiar la clave
            $logC = new LoginController();
            $logC->logout($request);

            return redirect()->intended(url('/estilista'));
        }

        if (auth()->guard('client')->user()) {

            $client = Client::where('rut', $rut)->FirstOrFail();

            $client->password = $request->password;

            $client->save();

            //hacemos logout luego de cambiar la clave
            $logC = new LoginController();
            $logC->logout($request);

            return redirect()->intended(url('/cliente'));
        } else {
            return redirect()->intended(url('/cliente'));
        }
    }
}
