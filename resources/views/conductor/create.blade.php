@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Registrar Nuevo Conductor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administrar/conductor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="placa">Nombre Completo de Chofer</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre completo..." required="">
            </div>
            <div class="form-group">
            	<label for="placa">Telefono Celular</label>
            	<input type="tel" name="telefono" class="form-control" placeholder="Numero..." required="">
            </div>
            <div class="form-group">
            	<label for="numeroAsientos">salario</label>
            	<input type="number" name="salario" step="any" required="" class="form-control" >
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