@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Actualizar la Ruta : {{ $Ruta_id->id_viajeRuta }}</h3>
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
			{!!Form::model($Ruta_id,['method'=>'PATCH','route'=>['principal.update',$Ruta_id->id_viajeRuta]])!!}
            {{Form::token()}}
            
            <div class="form-group">
            	<label for="viajebus">Actualizar el Bus Para el Viaje</label>
            	<select name="viajebus" class="form-control" style="background-color: #ccebff" >
            		@foreach ($buses as $bus)
            			@if($bus->id==$Ruta_id->bus)
							<option value="{{ $bus->id }}" selected>{{ $bus->tipoBus }} - {{ $bus->plazas }} - {{ $bus->placa }}</option>
						@else($bus->id==$Ruta_id->id_viajeRuta)
							<option value="{{ $bus->id }}" >{{ $bus->tipoBus }} - {{ $bus->plazas }} - {{ $bus->placa }}</option>
						@endif
					@endforeach
				</select>
            </div>
            <div class="form-group">
            	<label for="viajeconductor">Seleccione al Conductor</label>
            	<select name="viajeconductor" class="form-control" style="background-color: #ccebff" >
            		@foreach ($conductor as $con)
						@if($con->id_conductor==$Ruta_id->conductor)
							<option value="{{ $con->id_conductor }}" selected>{{ $con->nombre }}</option>
						@else
							<option value="{{ $con->id_conductor }}" >{{ $con->nombre }}</option>
						@endif
					@endforeach
				</select>
            </div>
            <div class="form-group">
            	<label for="destino_terminal">Destino - Ruta</label>
	            	<select name="destino_terminal" class="form-control" style="background-color: #ccebff">
						@foreach ($destino as $des)
							@if($des->id_destino==$Ruta_id->destino_terminal)
								<option value="{{ $des->id_destino }}" selected>{{ $des->NombreDestino }}</option>
							@else	
								<option value="{{ $des->id_destino }}" >{{ $des->NombreDestino }}</option>
							@endif
						@endforeach
					</select>
            </div>
            <div class="form-group">
            	<label for="fecha_viaje">Fecha de Salida</label>
            	<input type="date" value="{{ $Ruta_id->fecha_salida }}" name="fecha_viaje"  required="" class="form-control">
            </div>
		
			<div class="form-group">
            	<label for="precio_pasaje">Precio de Pasaje</label>
            	<input type="number" value="{{ $Ruta_id->precio_pasaje }}" name="precio_pasaje" min="0" required="" class="form-control">
            </div>
		
			<div class="form-group">
            	<label for="origen">Origen - Ruta</label>
	            	<select name="origen" class="form-control" style="background-color: #ccebff" required>
						@foreach ($destino as $des)
							@if($des->id_destino==$Ruta_id->origen)
								<option value="{{ $des->id_destino }}" selected>{{ $des->NombreDestino }}</option>
							@else	
								<option value="{{ $des->id_destino }}" >{{ $des->NombreDestino }}</option>
							@endif
						@endforeach
					</select>
	        </div>
		
			<div class="form-group">
            	<label for="hora_salida">Hora de Salida</label>
            	<input type="time" value="{{ $Ruta_id->hora_salida }}" name="hora_salida"  required="" class="form-control">
            </div>
		
			<div class="form-group">
            	<label for="carril_salida">Carril de Salida</label>
            	<input type="number" value="{{ $Ruta_id->carril_salida }}" name="carril_salida" min="0" max="60" required="" class="form-control" placeholder="Nro de carril">
            </div>
		
			<div class="form-group">
            	<label for="hora_llegada">Hora de Llegada</label>
            	<input type="time" value="{{ $Ruta_id->hora_llegada }}" name="hora_llegada"  required="" class="form-control">
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