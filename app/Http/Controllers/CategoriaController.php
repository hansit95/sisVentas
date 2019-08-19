<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Categoria;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct()
    {

    }
    //Esta funcion va obtener un objeto request y lo valida.
    public function index(Request $request)
    {
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
    		$categorias=DB::table('Categoria')->where('nombre','LIKE','%'.$query.'%')
    		->where ('condicion','=','1')
    		->orderBy ('idcategoria','desc')
    		->paginate (7);
    		//Retornamos a la vista index una vez obtenida la tabla categoria.
    		return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
    	}
    }
    //El metodo create va a retornar a una vista.
    public function create()
    {
    	return view("almacen.categoria.create");
    }
    //almacenar el objeto categoria en la tabla categoria de la base de datos.
    //Metodo POST no olvidar
    public function store(CategoriaFormRequest $request)
    {
    	$categoria= new Categoria;
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->condicion='1';
    	$categoria->save();
    	return Redirect::to('almacen/categoria');
    }
    //Muestra la vista del id seleccionado.
    public function show($id)
    {
    	return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    //Muestra la vista del id seleccionado para editar.
    public function edit($id)
    {
    	return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    //modificar
    public function update(CategoriaFormRequest $request,$id)
    {
    	$categoria=Categoria::findOrFail($id);
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->update();
    	return Redirect::to('almacen/categoria');
    }
    public function destroy($id)
    {
    	$categoria=Categoria::findOrFail($id);
    	$categoria->condicion=0;
    	$categoria->update();
    	return Redirect::to('almacen/categoria');
    }
}
