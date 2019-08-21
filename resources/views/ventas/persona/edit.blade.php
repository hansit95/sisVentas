@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-sx-12">
			<h3>Editar Cliente: {{ $persona->nombre}}</h3>
			<!--Estructura condicional if de validación.-->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				<!--Declaramos un bucle para resivir tos los errores por el arrichivo request-->
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			<!--Creamos el formulario-->
			{!!Form::model($persona,['method'=>'PATCH','route'=>['persona.update',$persona->idpersona]])!!}
			{{Form::token()}}
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <!-El name=nombre se utilizara en CategoriaController y en la CategoriaformRequest->
                    <input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control" placeholder="Nombre...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" value="{{$persona->direccion}}" class="form-control" placeholder="Dirección...">
                </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Documento</label>
                    <select name="tipo_documento" class="form-control">
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                        <option value="PAS">PAS</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="num_documento">Numero De Documento</label>
                    <input type="text" name="num_documento" value="{{$persona->num_documento}}" class="form-control" placeholder="Numero de Documento...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" value="{{ $persona->telefono}}" class="form-control" placeholder="Telefono...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{$persona->email}}" class="form-control" placeholder="Correo...">
                </div>
            </div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type='reset'>Cancelar</button>
			</div>

			{!!Form:: close()!!}
		</div>
	</div>
@endsection