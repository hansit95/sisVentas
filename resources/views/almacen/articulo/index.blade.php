@extends ('layouts.admin')
@section ('contenido')
<!-Se utiliza la rejilla de Boostrap->
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Articulos <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.articulo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Código</th>
					<th>Stock</th>
					<th>Imagen</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				@foreach ($articulos as $art)
				<tr>
					<td>{{ $cat->idarticulo}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->codigo}}</td>
					<td>{{ $cat->categoria}}</td>
					<td>{{ $cat->stock}}</td>
					<td>
						<img src="{{asset('Imagenes/articulos/'.$art->imagen}}" alt="{{ $cat->nombre}}" height="100px" width="100px" class="img-thumbnail">
					</td>
					<td>{{ $cat->estado}}</td>
					<td>
						<a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.categoria.modal')
				@endforeach
			</table>
		</div>
		{{$categorias->render()}}
	</div>
</div>
@endsection