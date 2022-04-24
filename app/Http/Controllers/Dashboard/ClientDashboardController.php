<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class ClientDashboardController extends Controller
{
    public function show()
    {
        //$name = $request->input('rut');
        //echo User::findOrFail($rut);
        //echo $request;
        return view('dashboards.client',['clientData'=>'xd holas']);
    }
}
