@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Pasajero</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administrar/boletoPasajero','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id_viaje">Seleccione el Viaje</label>
            	<select name="id_viaje" class="form-control" style="background-color: #ccebff" required>
						<option value="" ></option>
            		@foreach ($pasajes as $bus)
						<option value="{{ $bus->id_viajeRuta }}" >{{ $bus->bus }} - {{ $bus->destino_terminal }}</option>
					@endforeach
				</select>
            </div>
            <div class="form-group">
            	<label for="asiento">Nro Asiento</label>
            	<input type="number" min="0" max="50" name="asiento" class="form-control" placeholder="Nro Asiento..." required="">
            </div>
            <div class="form-group">
            	<label for="nombrePasajero">Nombre Completo de Pasajero</label>
            	<input type="text" name="nombrePasajero" required="" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="estado">Opcion</label>
	            	<select name="estado" class="form-control" style="background-color: #ccebff">
					  <option value="2">Reservar</option>
					  <option value="1">Comprar</option>
					</select>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection