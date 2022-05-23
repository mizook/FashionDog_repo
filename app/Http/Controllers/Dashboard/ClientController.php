<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Client;
use App\Models\Request as requestModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditClientRequest;
use App\Http\Requests\MakeServiceRequest;

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

    public function add_requests_page()
    {
        return view('dashboards.cliente.add_request');
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

    public function create_request(MakeServiceRequest $request)
    {
        $request->validated();

        $datetime = date('Y-m-d H:i:s', strtotime("$request->input_date $request->input_time"));

        $service_request = requestModel::create([
            'status' => "INGRESADA",
            'date' => $datetime
        ]);

        $service_request->save();

        return redirect('/cliente')->with('goodEdit', 'Solicitud enviada correctamente');
    }
}
