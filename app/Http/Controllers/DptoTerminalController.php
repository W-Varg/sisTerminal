<?php

namespace sisTerminal\Http\Controllers;

use Illuminate\Http\Request;

use sisTerminal\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use sisTerminal\Http\Requests\DptoTerminalFormRequest;
use sisTerminal\DptoTerminal;
use DB;

class DptoTerminalController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if($request)
        {
            $dptoTerminales = DB::table('dpto_terminal')
            ->orderBy('NombreDestino','desc')
            ->paginate(10);

            return view('dptoTerminal.index',["dptoTerminales"=>$dptoTerminales]);
        }

    }

    public function create()
    {
        return view('dptoTerminal.create');
    }

    public function store(DptoTerminalFormRequest $request) //store, almacena el objeto de tipo categoria
    {
        $obj = new DptoTerminal;
        $obj->NombreDestino= $request->get('NombreDestino');
        
        $obj->save();

        return Redirect::to('administrar/dptoTerminal'); //redireecionar al la URl
    }

    public function edit($id)
    {

        return view("dptoTerminal.edit",["dptoTerminal_id"=>DptoTerminal::findOrFail($id)]); //llamame  a esta bus por este id
    }

    public function update(DptoTerminalFormRequest $request,$id)
    {

        $obj=DptoTerminal::findOrFail($id); //llamame  a esta dptoTerminal por este id
        $obj->NombreDestino= $request->get('NombreDestino');
        $obj->update();

        return Redirect::to('administrar/dptoTerminal');
    }

    public function show($id) //shows
    {
        return view("dptoTerminal.show",["dptoTerminalShow"=>DptoTerminal::findOrFail($id)]); //llamame  a esta bus por este id
    }

    public function destroy($id) //elimina el dptoTerminal
    {
        $obj=DptoTerminal::findOrFail($id);
        $obj->delete();

        return Redirect::to('administrar/dptoTerminal'); //redireecionar al la URl
    }
}
