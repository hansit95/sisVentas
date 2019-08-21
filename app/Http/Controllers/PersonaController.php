<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Persona;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\PersonaFormRequest;
use DB;

class PersonaController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $personas=DB::table('Persona')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy ('idpersona','desc')
            ->paginate (7);
            return view('ventas.persona.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("ventas.persona.create");
    }

    public function store(PersonaFormRequest $request)
    {
        $persona= new Persona;
        $persona->tipo_persona='Cliente';
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->save();
        return Redirect::to('ventas/persona');
    }

    public function edit($id)
    {
        return view("ventas.persona.edit",["persona"=>Persona::findOrFail($id)]);
    }

    public function update(PersonaFormRequest $request,$id)
    {
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona='Cliente';
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->update();
        return Redirect::to('ventas/persona');
    }

    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona='Inactivo';
        $persona->update();
        return Redirect::to('ventas/persona');
    }
}