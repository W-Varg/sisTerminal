<?php

namespace sisTerminal\Http\Controllers;

use Illuminate\Http\Request;

use sisTerminal\Http\Requests;
use sisTerminal\Bus;

use Illuminate\Support\Facades\Redirect;
use sisTerminal\Http\Requests\FormBusRequests;
use DB;

class BusController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $buses = DB::table('buses')
            ->where('tipoBus','LIKE', '%'.$query.'%' )
            ->where('estado','=','disponible')
            ->orderBy('id','desc')
            ->paginate(10);

            return view('bus.index',["buses"=>$buses,"searchText"=>$query]);
        }

    }

    public function create()
    {
        return view('bus.create');
    }

    public function store(FormBusRequests $validar) //store, almacena el objeto de tipo categoria
    {
        $bus = new Bus;
        $bus->placa= $validar->get('placa');
        $bus->tipoBus= $validar->get('tipoBus');
        $bus->plazas= $validar->get('numeroAsientos');
        $bus->estado= $validar->get('disponible');
        
        $bus->save();

        return Redirect::to('administrar/bus'); //redireecionar al la URl
    }

    public function edit($id)
    {

        return view("bus.edit",["busId"=>Bus::findOrFail($id)]); //llamame  a esta bus por este id
    }

    public function update(FormBusRequests $request,$id)
    {

        $bus=Bus::findOrFail($id); //llamame  a esta bus por este id
        $bus->placa= $request->get('placa');
        $bus->tipoBus= $request->get('tipoBus');
        $bus->plazas= $request->get('numeroAsientos');
        $bus->update();

        return Redirect::to('administrar/bus');
    }

    public function show($id) //shows
    {
        return view("bus.show",["bus"=>Bus::findOrFail($id)]); //llamame  a esta bus por este id
    }

    public function destroy($id) //desactiva el bus en caso de reparacion
    {
        $bus=Bus::findOrFail($id);
        $bus->estado='No disponible';
        $bus->update(); 
        // el motodo no esta eliminando 
        return Redirect::to('administrar/bus');
    }
}
