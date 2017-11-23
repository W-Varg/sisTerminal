<?php

namespace sisTerminal\Http\Controllers;

use Illuminate\Http\Request;

use sisTerminal\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use sisTerminal\Http\Requests\BoletoPasajeroFormRequest;
use sisTerminal\BoletoPasajero;
use DB;

class BoletaPasajeroController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        
        if($request)
        {
            $query = trim($request->get('searchText'));
            $datos = DB::table('boletos_pasajero')
            ->where('asiento','LIKE', '%'.$query.'%' )
            ->orwhere('nombrePasajero','LIKE', '%'.$query.'%' )
            ->orwhere('estado','LIKE', '%'.$query.'%' )
            ->orderBy('fecha','desc')
            ->paginate(10);

            return view('boletoPasajero.index',["boletos"=>$datos,"searchText"=>$query]);
        }

    }

    public function create()
    {
    	$pasajes = DB::table('viaje_ruta')->get();
        return view('boletoPasajero.create',["pasajes"=>$pasajes]);
    }

    public function store(BoletoPasajeroFormRequest $request) //store, almacena el objeto de tipo categoria
    {
        $obj = new BoletoPasajero;
        $obj->id_viaje= $request->get('id_viaje');
        $obj->asiento= $request->get('asiento');
        $obj->nombrePasajero= $request->get('nombrePasajero');
        $obj->estado= $request->get('estado');
        $obj->fecha= date("Y-m-d H:i:s");
        
        $obj->save();

        return Redirect::to('administrar/boletoPasajero'); //redireecionar al la URl
    }

    public function edit($id)
    {

        return view("boletoPasajero.edit",["boletoPasajero_id"=>BoletoPasajero::findOrFail($id)]); //llamame  a esta bus por este id
    }

    public function update(BoletoPasajeroFormRequest $request,$id)
    {

        $obj=BoletoPasajero::findOrFail($id); //llamame  a esta boletoPasajero por este id
        $obj->asiento= $request->get('asiento');
        $obj->nombrePasajero= $request->get('nombrePasajero');
        //$obj->estado= $request->get('estado');
        $obj->fecha= date("Y-m-d H:i:s");
        $obj->update();

        return Redirect::to('administrar/boletoPasajero');
    }

    public function show($id) //shows
    {
        return view("boletoPasajero.show",["boletoPasajeroShow"=>BoletoPasajero::findOrFail($id)]); //llamame  a esta bus por este id
    }

    public function destroy($id) //elimina el boletoPasajero
    {
        $obj=BoletoPasajero::findOrFail($id);
        $obj->delete();

        return Redirect::to('administrar/boletoPasajero'); //redireecionar al la URl
    }
}
