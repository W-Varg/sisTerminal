@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Actualizar el Boleto : {{ $boletoPasajero_id->id_boleto }}</h3>
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
			{!!Form::model($boletoPasajero_id,['method'=>'PATCH','route'=>['administrar.boletoPasajero.update',$boletoPasajero_id->id_boleto]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id_viaje" name="id_viaje" value="{{ $boletoPasajero_id->id_viaje }}"></label>
            </div>
            <div class="form-group">
            	<label for="asiento">Nro Asiento</label>
            	<input type="number" min="0" max="50" name="asiento" value="{{ $boletoPasajero_id->asiento }}" class="form-control" placeholder="Nro Asiento..." required="">
            </div>
            <div class="form-group">
            	<label for="nombrePasajero">Nombre Completo de Pasajero</label>
            	<input type="text" name="nombrePasajero" required="" class="form-control" value="{{ $boletoPasajero_id->nombrePasajero }}" placeholder="Nombre...">
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