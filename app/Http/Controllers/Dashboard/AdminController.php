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
        return view('dashboards.administrator.admin_dashboard');
    }

    public function show_stylists_page()
    {
        $stylists = DB::select('select * from stylists');
        return view('dashboards.administrator.stylists_page', ['stylists' => $stylists]);
    }

    public function show_edit_stylists_page($rut)
    {
        $stylist = Stylist::where('rut', $rut)->FirstOrFail();
        return view('dashboards.administrator.edit_stylist')->with('stylist', $stylist);
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
        $selectedStylist = Stylist::where('rut', $stylist)->first();
        $selectedClient = Client::where('rut', $client)->first();

        if ($selectedStylist != null) {
            if ($selectedStylist->status == 1) {
                $selectedStylist->status = 0;

                $selectedStylist->save();

                session()->put('client', 00000);
                session()->put('stylist', 00000);

                return redirect()->route('admin.dashboard')->with('disableStylist', 'msg');
            } else {
                $selectedStylist->status = 1;

                $selectedStylist->save();

                session()->put('client', 00000);
                session()->put('stylist', 00000);

                return redirect()->route('admin.dashboard')->with('enableStylist', 'msg');
            }
        }
        if ($selectedClient != null) {
            if ($selectedClient->status == 1) {
                $selectedClient->status = 0;

                $selectedClient->save();

                session()->put('client', 00000);
                session()->put('stylist', 00000);

                return redirect()->route('admin.dashboard')->with('disableClient', 'msg');
            } else {
                $selectedClient->status = 1;

                $selectedClient->save();

                session()->put('client', 00000);
                session()->put('stylist', 00000);

                return redirect()->route('admin.dashboard')->with('enableClient', 'msg');
            }
        }

        return redirect()->route('admin.dashboard')->with('disableUserError', 'msg');
    }

    public function find_user(DisableUserRequest $request)
    {
        $request->validated();

        $stylist = Stylist::where('rut', $request->userRut)->first();
        $client = Client::where('rut', $request->userRut)->first();

        if ($stylist != null) {
            session()->put('stylist', $stylist);
            session()->put('client', 00000);
            return redirect()->route('admin.dashboard')->with('stylistFound', $stylist);
        }
        if ($client != null) {
            session()->put('client', $client);
            session()->put('stylist', 00000);
            return redirect()->route('admin.dashboard')->with('clientFound', $client);
        }

        return redirect()->route('admin.dashboard')->with('userNotFound', 'Error');
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
