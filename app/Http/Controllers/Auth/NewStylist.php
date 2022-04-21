<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewStylist extends Controller
{
    public function enviar(){

        Mail::to("socram174@hotmail.com")->send(new NewStylist());
    }
}
