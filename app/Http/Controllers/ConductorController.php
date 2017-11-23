<?php

namespace sisTerminal\Http\Controllers;

use Illuminate\Http\Request;

use sisTerminal\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use sisTerminal\Http\Requests\ConductorFormRequest;
use sisTerminal\Conductor;
use DB;

class ConductorController extends Controller
{
        public function __construct()
    {

    }
    public function index(Request $request)
    {
        if($request)
        {
            $conductores = DB::table('conductores')
            ->orderBy('nombre','desc')
            ->paginate(10);

            return view('conductor.index',["conductores"=>$conductores]);
        }

    }

    public function create()
    {
        return view('conductor.create');
    }

    public function store(ConductorFormRequest $validar) //store, almacena el objeto de tipo categoria
    {
        $conduc = new Conductor;
        $conduc->nombre= $validar->get('nombre');
        $conduc->telefono= $validar->get('telefono');
        $conduc->salario= $validar->get('salario');
        
        $conduc->save();

        return Redirect::to('administrar/conductor'); //redireecionar al la URl
    }

    public function edit($id)
    {

        return view("conductor.edit",["conductor_id"=>Conductor::findOrFail($id)]); //llamame  a esta bus por este id
    }

    public function update(ConductorFormRequest $request,$id)
    {

        $conduc=Conductor::findOrFail($id); //llamame  a esta bus por este id
        $conduc->nombre= $request->get('nombre');
        $conduc->telefono= $request->get('telefono');
        $conduc->salario= $request->get('salario');
        $conduc->update();

        return Redirect::to('administrar/conductor');
    }

    public function show($id) //shows
    {
        return view("conductor.show",["conductorShow"=>Conductor::findOrFail($id)]); //llamame  a esta bus por este id
    }

    public function destroy($id) //elimina el conductor
    {
        $conduc=Conductor::findOrFail($id);
        $conduc->delete();

        return Redirect::to('administrar/conductor'); //redireecionar al la URl
    }
}
