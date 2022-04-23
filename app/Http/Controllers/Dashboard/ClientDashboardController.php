<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function show()
    {
        return view('dashboards.client');
    }
}
