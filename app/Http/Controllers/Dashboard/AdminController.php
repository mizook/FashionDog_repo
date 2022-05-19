<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Stylist;
use App\Models\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditStylistRequest;
use App\Http\Requests\RegisterStylistRequest;
use App\Http\Requests\DisableUserRequest;




class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator', ['except' => 'logout']);
    }

    public function show_dashboard()
    {
        return view('dashboards.admin');
    }

    public function show_stylists_page()
    {
        $stylists = DB::select('select * from stylists');
        return view('dashboards.estilista.estilistas', ['stylists' => $stylists]);
    }

    public function show_edit_stylists_page($rut)
    {
        $stylist = Stylist::where('rut', $rut)->FirstOrFail();
        return view('dashboards.estilista.editar')->with('stylist', $stylist);
    }

    public function create_stylist(RegisterStylistRequest $request)
    {
        $request->validated();



        $stylist = Stylist::create([
            'rut' => $request->rut,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->rut,
        ]);

        $stylist->save();

        return redirect('/admin/estilistas')->with('goodAddStylist', 'El estilista fue creado exitosamente');
    }

    public function update_stylist(EditStylistRequest $request, $rut)
    {
        $request->validated();


        $stylist = Stylist::where('rut', $rut)->FirstOrFail();

        if ($stylist == null) {
            return redirect('/admin')->with('clientError', 'El cliente no existe');
        }

        $stylistWithSameEmail = Stylist::where('email', $request->email)->first();

        if ($stylistWithSameEmail != null && $stylist->rut != $stylistWithSameEmail->rut) {
            return redirect('/admin/estilistas')->with('emailError', 'Este email ya está registrado.');
        }

        $stylist->name = $request->name;
        $stylist->last_name = $request->last_name;
        $stylist->email = $request->email;
        $stylist->phone = $request->phone;

        $stylist->save();

        return redirect('/admin/estilistas')->with('goodEditStylist', 'El estilista fue registrado exitosamente');
    }

    public function change_status_user($stylist, $client)
    {
        if ($stylist != null) {
            if ($stylist->status == 1) {
                $stylist->status = 0;

                $stylist->save();
                return redirect()->route('admin.dashboard')->with('disableStylist', 'msg');
            } else {
                $stylist->status = 1;

                $stylist->save();
                return redirect()->route('admin.dashboard')->with('enableStylist', 'msg');
            }
        }
        if ($client != null) {
            if ($client->status == 1) {
                $client->status = 0;

                $client->save();
                return redirect()->route('admin.dashboard')->with('disableClient', 'msg');
            } else {
                $client->status = 1;

                $client->save();
                return redirect()->route('admin.dashboard')->with('enableClient', 'msg');
            }
        }

        return redirect()->route('admin.dashboard')->with('disableUserError', 'msg');
    }

    public function find_user(DisableUserRequest $request)
    {
        //dd($request);
        $request->validated();

        $stylist = Stylist::where('rut', $request->userRut)->first();
        $client = Client::where('rut', $request->userRut)->first();


        if ($stylist == null) {
            if ($client == null) {
                return redirect()->route('admin.dashboard')->with('userNotFind', 'Error');
            }
            $this->change_status_user(null, $client);
        }
        $this->change_status_user($stylist, null);
        return redirect()->route('admin.dashboard')->with('userNotFind', 'Error');
    }

    public function status_stylist(Request $request)
    {

        $message = "";
        $stylist = Stylist::where('rut', $request->rut)->FirstOrFail();

        if ($stylist->status == 1) {
            $stylist->status = 0;
            $message = "El usuario fue desactivado exitosamente";
        } else {
            $stylist->status = 1;
            $message = "El usuario fue activado exitosamente";
        }

        $stylist->save();
        return redirect('/admin/estilistas')->with('goodEditStatusStylist', $message);
    }
}
