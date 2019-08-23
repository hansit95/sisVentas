<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Articulo;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Request\ArticuloFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class ArticuloController extends Controller
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
            $articulo=DB::table('articulo as a')
            ->join('categoria as c', 'a.idcategoria','=','c.idcategoria')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->where ('a.nombre','LIKE','%'.$query.'%')
    		->orderBy ('idarticulo','desc')
    		->paginate (7);
    		//Retornamos a la vista index una vez obtenida la tabla categoria.
    		return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
    	}
    }
    //El metodo create va a retornar a una vista.
    public function create()
    {
        $categorias = DB::table('categoria')->where ('condicion','=','1')->get();
    	return view("almacen.categoria.create",["categorias"=>$categorias]);
    }
    //almacenar el objeto categoria en la tabla categoria de la base de datos.
    //Metodo POST no olvidar
    public function store(ArticuloFormRequest $request)
    {
    	$articulo= new articulo;
    	$articulo->idecategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';

        if (input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'imagenes/articulos/',$file->getClienteOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }

    	$articulo->save();
    	return Redirect::to('almacen/articulo');
    }
    //Muestra la vista del id seleccionado.
    public function show($id)
    {
    	return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }
    //Muestra la vista del id seleccionado para editar.
    public function edit($id)
    {
        $articulo=Articulo::findOrFail($id);
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
    	return view("almacen.articulo.edit",["articulo"=>Articulo::findOrFail($id)]);
    }
    //modificar
    public function update(ArticuloFormRequest $request,$id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->idecategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';

        if (input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'imagenes/articulos/',$file->getClienteOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }

    	$articulos->update();
    	return Redirect::to('almacen/articulo');
    }
    public function destroy($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$articulo->estado='Inactivo';
    	$categoria->update();
    	return Redirect::to('almacen/articulo');
    }
}
