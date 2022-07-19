<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Client;
use App\Models\Service;
use App\Models\Request as RequestModel;
use App\Models\ClientRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditClientRequest;
use App\Http\Requests\MakeServiceRequest;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client', ['except' => 'logout']);
    }

    public function show_dashboard()
    {
        return view('dashboards.client.client_dashboard');
    }

    public function show_edit_page()
    {
        return view('dashboards.client.edit_data');
    }

    public function add_requests_page()
    {
        return view('dashboards.client.add_request');
    }

    public function manage_requests_page()
    {
        $totalRequests = ClientRequest::where('client_rut', Auth::user()->rut)->count();
        $clientRequestsData = DB::select('select * from client_requests inner join requests on client_requests.request_id=requests.id where client_requests.client_rut = ? order by id desc', [Auth::user()->rut]);
        return view('dashboards.client.manage_request', ['clientRequestsData' => $clientRequestsData, 'totalRequests' => $totalRequests]);
    }

    public function cancel_request(Request $request)
    {
        $message = "";
        $clientRequest = RequestModel::where('id', $request->id)->FirstOrFail();

        if ($clientRequest->status == 'INGRESADA') {
            $clientRequest->status = 'ANULADA';
            $message = "La solicitud fue anulada exitosamente";
        } else {
            $message = "La solicitud ya fue anulada";
        }

        $clientRequest->save();
        return redirect('/cliente/manageRequests')->with('goodEditStatusRequest', $message);
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

    public function create_request(MakeServiceRequest $request, $rut)
    {
        $request->validated();

        $datetime = date('Y-m-d H:i:s', strtotime("$request->input_date $request->input_time"));

        if (RequestModel::whereDate('date', $request->input_date)->count() > 0) {
            return redirect('/cliente/solicitud')->with('dateError', 'La fecha que intentas escoger ya está agendada!');
        }

        $service_request = RequestModel::create([
            'status' => "INGRESADA",
            'date' => $datetime
        ]);

        $service_request->save();

        $client_service_request = ClientRequest::create([
            'client_rut' => $rut,
            'request_id' => $service_request->id
        ]);

        $client_service_request->save();

        return redirect('/cliente')->with('requestAdded', 'Solicitud enviada correctamente');
    }
}
