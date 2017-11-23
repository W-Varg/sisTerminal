<?php

namespace sisTerminal\Http\Controllers;

use Illuminate\Http\Request;

use sisTerminal\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use sisTerminal\Http\Requests\ViajeRutaFormRequest;
use sisTerminal\ViajeRuta;
use DB;

class ViajeRutaController extends Controller
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

            return view('viaje.index',["viajeRutas"=>$viajeRuta,"searchText"=>$query]);
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
        $buses =DB::table('buses')->where('estado','=','disponible')->get();
        $conductor =DB::table('conductores')->get();
        $destino =DB::table('dpto_terminal')->get();

        return view("viaje.edit",["Ruta_id"=>$viajeRuta,"conductor"=>$conductor,"destino"=>$destino,"buses"=>$buses,]);
        //llamamos a Viaje.edit, y le enviamos conductores, destinos , buses diaponibles, mas el id
    }
    public function update(ViajeRutaFormRequest $validar,$id)
    {

        $obj=ViajeRuta::findOrFail($id); //llamame  a esta viajeRuta por este id
        $obj->bus= $validar->get('viajebus');
        $obj->conductor= $validar->get('viajeconductor');
        $obj->destino_terminal= $validar->get('destino_terminal');
        $obj->fecha_viaje= $validar->get('fecha_viaje');
        $obj->origen= $validar->get('origen');
        $obj->hora_salida= $validar->get('hora_salida');
        $obj->hora_llegada= $validar->get('hora_llegada');
        $obj->carril_salida= $validar->get('carril_salida');
        $obj->precio_pasaje= $validar->get('precio_pasaje');

        $obj->update();

        return Redirect::to('administrar/viajeRuta');
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
