@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-sx-12">
			<h3>Nueva Categoría</h3>
			<!-Estructura condicional if de validación.->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				<!-Declaramos un bucle para resivir tos los errores por el arrichivo request->
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			<!-Creamos el formulario->
			{!!Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<!-El name=nombre se utilizara en CategoriaController y en la CategoriaformRequest->
				<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type='reset'>Cancelar</button>
			</div>

			{!!Form:: close()!!}
		</div>
	</div>
@endsection