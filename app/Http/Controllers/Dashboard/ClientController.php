<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditClientRequest;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client', ['except' => 'logout']);
    }

    public function show_dashboard()
    {
        return view('dashboards.client');
    }

    public function show_edit_page()
    {
        return view('dashboards.cliente.editar');
    }

    public function update_client(EditClientRequest $request, $rut)
    {
        $request->validated();

        $client = Client::where('rut', $rut)->first();

        if ($client == null) {
            return redirect('/cliente')->with('clientError', 'El cliente no existe');
        }

        $clientWithSameEmail = Client::where('email', $request->email)->first();

        if ($clientWithSameEmail != null && $client->rut != $clientWithSameEmail->rut) {
            return redirect('/cliente/editar')->with('emailError', 'Este email ya está registrado.');
        }

        $client->name = $request->name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->phone = $request->phone;

        $client->save();

        return redirect('/cliente')->with('goodEdit', 'Datos actualizados satisfactoriamente');
    }
}
