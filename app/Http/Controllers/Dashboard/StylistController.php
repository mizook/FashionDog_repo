<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
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
}
