@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Actualizar Conductor : {{ $conductor_id->id_conductor }}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			<!--el metodo route, es la URL SEPARADO POR (.)
				em metodo REDIRECT es ULR separado por (/)
				el metodo return view("bus.edit") es al carpeta.metodo


				recibe los campos de la base de datos
				-->
			{!!Form::model($conductor_id,['method'=>'PATCH','route'=>['administrar.conductor.update',$conductor_id->id_conductor]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="placa">Nombre Completo</label>
            	<input type="text" name="nombre" class="form-control" value="{{ $conductor_id->nombre }}" required="">
            </div>
            <div class="form-group">
            	<label for="placa">Numero Telefono</label>
            	<input type="tel" name="telefono" class="form-control" value="{{ $conductor_id->telefono }}" required="">
            </div>
            <div class="form-group">
            	<label for="placa">Salario</label>
            	<input type="number" name="salario" step="any" class="form-control" value="{{ $conductor_id->salario }}" required="" style="background-color: #ccebff">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection