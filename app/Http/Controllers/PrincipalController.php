<?php

namespace sisTerminal\Http\Controllers;

use Illuminate\Http\Request;

use sisTerminal\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use sisTerminal\Http\Requests\ViajeRutaFormRequest;
use sisTerminal\Http\Requests\PrincipalFormRequest;
use sisTerminal\ViajeRuta;
use sisTerminal\BoletoPasajero;
use DB;

class PrincipalController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));

            $viajeRuta = DB::table('viaje_ruta as vr')
            ->join('buses as b', 'vr.bus', '=', 'b.id')
            ->join('conductores as c', 'vr.conductor', '=', 'c.id_conductor')
            ->join('dpto_terminal as dt', 'vr.destino_terminal', '=', 'dt.id_destino')          
            ->select('vr.*','b.placa','b.tipoBus','b.plazas','c.nombre as conductor','dt.NombreDestino as destino')
            ->where('vr.destino_terminal','LIKE','%'.$query.'%')
            ->orwhere('b.tipoBus','LIKE', '%'.$query.'%' )
            ->groupBy('vr.id_viajeRuta')
            ->orderBy('vr.destino_terminal','desc')
            ->paginate(10);

            return view('principal.index',["viajeRutas"=>$viajeRuta,"searchText"=>$query]);
        }

    }


    public function create()
    {
        $bus =DB::table('buses')->where('estado','=','disponible')->get();
        $conductor =DB::table('conductores')->get();
        $destino =DB::table('dpto_terminal')->get();

        return view("viaje.create",["buses"=>$bus,"conductor"=>$conductor,"destino"=>$destino]);
    }

    public function store(ViajeRutaFormRequest $validar) //store, almacena el objeto de tipo categoria
    {
        $obj = new ViajeRuta;
        $obj->bus= $validar->get('viajebus');
        $obj->conductor= $validar->get('viajeconductor');
        $obj->fecha_viaje= $validar->get('fecha_viaje');
        $obj->origen= $validar->get('origen');
        $obj->hora_salida= $validar->get('hora_salida');
        $obj->destino_terminal= $validar->get('destino_terminal');
        $obj->hora_llegada= $validar->get('hora_llegada');
        $obj->carril_salida= $validar->get('carril_salida');
        $obj->precio_pasaje= $validar->get('precio_pasaje');

        $obj->save();

        return Redirect::to('administrar/viajeRuta'); //redireecionar al la URl
    }

    public function edit($id)
    {
        $viajeRuta = ViajeRuta::findOrFail($id);
        $buses =DB::table('buses')->where('id','=',$viajeRuta->bus)->get();
        $asiDisponible =DB::table('boletos_pasajero')->where('id_viaje','=',$viajeRuta->id_viajeRuta)->get();
        $conductor =DB::table('conductores')->where('id_conductor','=',$viajeRuta->conductor)->get();
        $destino =DB::table('dpto_terminal')->where('id_destino','=',$viajeRuta->destino_terminal)->get();
        $origen =DB::table('dpto_terminal')->where('id_destino','=',$viajeRuta->origen)->get();

        return view("principal.edit",["asientosOcupados"=>$asiDisponible,"Ruta_id"=>$viajeRuta,"conductor"=>$conductor,"destino"=>$destino,"origen"=>$origen,"buses"=>$buses,]);
        
    }
    public function update(PrincipalFormRequest $validar,$id)
    {
        $viajeRuta = ViajeRuta::findOrFail($id);
        $buses =DB::table('buses')->where('id','=',$viajeRuta->bus)->get();
        $asiDisponible =DB::table('boletos_pasajero')->where('id_viaje','=',$viajeRuta->id_viajeRuta)->get();
        $conductor =DB::table('conductores')->where('id_conductor','=',$viajeRuta->conductor)->get();
        $destino =DB::table('dpto_terminal')->where('id_destino','=',$viajeRuta->destino_terminal)->get();
        $origen =DB::table('dpto_terminal')->where('id_destino','=',$viajeRuta->origen)->get();

        $obj = new BoletoPasajero;
        $obj->id_viaje=$id;
        $obj->asiento= $validar->get('asiento');
        $obj->nombrePasajero= $validar->get('nombre').' '.$validar->get('apellido');
        $obj->estado= '2';
        $obj->fecha= date("Y-m-d H:i:s");

        $obj->save();

         //redireecionar al la URl

        return view('principal.factura',["objeto"=>$obj,"Ruta_id"=>$viajeRuta,"conductor"=>$conductor,"destino"=>$destino,"origen"=>$origen,"buses"=>$buses,]);
    }

    public function show($id) //shows
    {
        return view("viaje.show",["viajeRuta_id"=>ViajeRuta::findOrFail($id)]); //llamame  a esta bus por este id
    }

    public function destroy($id) //desactiva el bus en caso de reparacion
    {
        $obj=ViajeRuta::findOrFail($id);
        $obj->delete();
        return Redirect::to('administrar/viajeRuta');
    }
}
