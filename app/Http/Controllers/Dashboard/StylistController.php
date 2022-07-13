<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StylistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:stylist', ['except' => 'logout']);
    }

    public function show_dashboard()
    {
        return view('dashboards.stylist.stylist_dashboard');
    }

    public function show_take_requests_page(Request $request)
    {
        if ($request->input_date == null) $request->input_date = date("m/d/Y");

        $filter_requests = DB::table('clients')
            ->join('client_requests', 'clients.rut', '=', 'client_requests.client_rut')
            ->join('requests', 'client_requests.request_id', '=', 'requests.id')
            ->whereDate('requests.date', $request->input_date)
            ->where('requests.status', '=', 'INGRESADA')
            ->get();

        return view('dashboards.stylist.stylist_client_requests', ['filter_requests' => $filter_requests, 'total_requests' => $filter_requests->count()]);
    }

    public function take_request()
    {
        //CONTINUAR AQUI EL CODIGO QUE FALTA

        //CAMBIARLE EL ESTADO A LA SOLICITUD VERIFICANDO CON LA HORA ACTUAL DEL DIA
        return;
    }
}
