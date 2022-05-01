<?php

namespace App\Http\Controllers;

use App\Models\Stylist;
use Illuminate\Http\Request;
use App\Rules\RutValidator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StylistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator', ['except' => 'logout']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'rut' => ['required', 'unique:stylists,rut'],
            'name' => ['required', 'min:2', 'max:26'],
            'last_name' => ['required', 'min:2', 'max:26'],
            'email' => ['required', 'max:320', 'unique:clients,email', 'email'],
            'phone' => ['required', 'min:9', 'max:15'],
        ]);

        $stylist = Stylist::create([
            'rut' => $request->rut,
            'password' => bcrypt($request->rut),
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $stylist->save();

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $stylists = DB::select('select * from stylists');
        return view('dashboards.estilista.estilistas', ['stylists' => $stylists]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rut)
    {
        $stylist = Stylist::where('rut', $rut)->FirstOrFail();
        return view('dashboards.estilista.editar')->with('stylist', $stylist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rut)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:26'],
            'last_name' => ['required', 'min:2', 'max:26'],
            'email' => ['required', 'max:320', 'unique:clients,email', 'email'],
            'phone' => ['required', 'min:9', 'max:15'],
        ]);

        $stylist = Stylist::where('rut', $rut)->FirstOrFail();

        $stylist->name = $request->name;
        $stylist->last_name = $request->last_name;
        $stylist->email = $request->email;
        $stylist->phone = $request->phone;

        $stylist->save();

        return redirect('/admin');
    }

    public function changeStatus(Request $request){


        $stylist = Stylist::where('rut', $request->rut)->FirstOrFail();

        $message="";

        if($stylist->status == 1){
            $stylist->status = 0;
            $message="El usuario se ha desactivado con exito";
        }else{
            $stylist->status = 1;
            $message="El usuario se ha activado con exito";
        }
        $stylist->save();


        return redirect('/admin')->with('message',$message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
