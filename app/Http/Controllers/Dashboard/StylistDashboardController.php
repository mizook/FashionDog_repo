<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StylistDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:stylist', ['except' => 'logout']);
    }

    public function show()
    {
        return view('dashboards.stylist');
    }
}
