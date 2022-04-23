<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StylistDashboardController extends Controller
{
    public function show()
    {
        return view('dashboards.stylist');
    }
}
