<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Auth;

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

    public function request_list_page()
    {
        $requestsDone = Service::where('stylist_rut', Auth::user()->rut)->count();
        $stylistRequestsData = DB::select('select * from clients cl, requests rq, services s where rq.id=s.request_id and s.stylist_rut = ? and cl.rut=(select client_rut from client_requests where request_id=rq.id) order by id desc', [Auth::user()->rut]);

        //dd($allData);

        return view('dashboards.stylist.request_list', ['stylistRequestsData' => $stylistRequestsData, 'requestsDone' => $requestsDone]);
    }

    public function show_take_requests_page(Request $request)
    {
        date_default_timezone_set('America/Santiago');

        if ($request->input_date == null) $request->input_date = date("Y-m-d");

        $filter_requests = DB::table('clients')
            ->join('client_requests', 'clients.rut', '=', 'client_requests.client_rut')
            ->join('requests', 'client_requests.request_id', '=', 'requests.id')
            ->whereDate('requests.date', $request->input_date)
            ->where('requests.status', '=', 'INGRESADA')
            ->get();


        return view('dashboards.stylist.stylist_client_requests', ['filter_requests' => $filter_requests, 'total_requests' => $filter_requests->count()]);
    }

    public function take_request($requestDate, $requestId)
    {
        date_default_timezone_set('America/Santiago');

        $timestamp = strtotime($requestDate);
        $date = date('Y-n-j', $timestamp); // YYYY-mm-dd
        $time = date('H:i:s', $timestamp); // HH:mm:ss

        //Día ya pasado
        if (strtotime($date) < strtotime(date("Y-m-d"))) {
            //dd('ATENDIDA CON RETRASO 1');
            $request = DB::table('requests')->where('id', $requestId)->update(['status' => "ATENDIDA CON RETRASO"]);
        }

        //Día futuro
        if (strtotime($date) > strtotime(date("Y-m-d"))) {
            //dd("ATENDIDA A TIEMPO 1");
            $request = DB::table('requests')->where('id', $requestId)->update(['status' => "ATENDIDA A TIEMPO"]);
        }

        //Mismo día
        if (strtotime($date) == strtotime(date("Y-m-d")) && time() > strtotime($time)) {
            //dd("ATENDIDA CON RETRASO 2");
            $request = DB::table('requests')->where('id', $requestId)->update(['status' => "ATENDIDA CON RETRASO"]);
        }

        //dd("ATENDIDA A TIEMPO 2");
        $request = DB::table('requests')->where('id', $requestId)->update(['status' => "ATENDIDA A TIEMPO"]);

        //Creamos el servicio que relaciona el estilista y la request id, además de agregar un comentario
        $new_service = Service::create([
            'stylist_rut' => Auth::user()->rut,
            'request_id' => $requestId,
            'comment' => ''
        ]);

        $message = "";
        return redirect('/estilista')->with('requestTaken', $message);
    }
}
