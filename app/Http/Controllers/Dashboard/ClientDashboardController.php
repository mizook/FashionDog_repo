<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client', ['except' => 'logout']);
    }

    public function show()
    {
        return view('dashboards.client');
    }

    public function update(Request $request, $rut)
    {

        $request->validate([
            'name' => ['required', 'min:2', 'max:26'],
            'last_name' => ['required', 'min:2', 'max:26'],
            'email' => ['required', 'max:320', 'email'],
            'address' => ['required', 'max:30', 'unique:clients,email'],
            'phone' => ['required', 'min:9', 'max:15'],
        ]);

        $client = Client::where('rut', $rut)->FirstOrFail();


        $client->name = $request->name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->phone = $request->phone;

        $client->save();

        return redirect('/cliente')->with('message','Datos actualizados satisfactoriamente');
    }
    public function show_editar()
    {
        return view('dashboards.cliente.editar');
    }
}
