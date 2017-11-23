@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Ruta</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::open(array('url'=>'administrar/viajeRuta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
	            	<label for="viajebus">Seleccione el Bus Para el Viaje</label>
	            	<select name="viajebus" class="form-control" style="background-color: #ccebff" required>
							<option value="" ></option>
	            		@foreach ($buses as $bus)
							<option value="{{ $bus->id }}" >Tipo: {{ $bus->tipoBus }} _  Asientos: {{ $bus->plazas }} _ Placa: {{ $bus->placa }}</option>
						@endforeach
					</select>
	            </div>
		
			<div class="form-group">
	            	<label for="viajeconductor">Seleccione al Conductor</label>
	            	<select name="viajeconductor" class="form-control" style="background-color: #ccebff" required>
	    	        		<option value="" ></option>
	            		@foreach ($conductor as $con)
							<option value="{{ $con->id_conductor }}" >{{ $con->nombre }}</option>
						@endforeach
					</select>
	            </div>
		
			<div class="form-group">
	            	<label for="destino_terminal">Destino - Ruta</label>
		            	<select name="destino_terminal" class="form-control" style="background-color: #ccebff" required>
								<option value="" ></option>
							@foreach ($destino as $des)
								<option value="{{ $des->id_destino }}" >{{ $des->NombreDestino }}</option>
							@endforeach
						</select>
	        </div>
		
			<div class="form-group">
            	<label for="fecha_viaje">Fecha de Salida</label>
            	<input type="date" name="fecha_viaje"  required="" class="form-control">
            </div>
		
			<div class="form-group">
            	<label for="precio_pasaje">Precio de Pasaje</label>
            	<input type="number" name="precio_pasaje" min="0" required="" class="form-control">
            </div>
		
			<div class="form-group">
            	<label for="origen">Origen - Ruta</label>
	            	<select name="origen" class="form-control" style="background-color: #ccebff" required>
							<option value="" ></option>
						@foreach ($destino as $des)
							<option value="{{ $des->id_destino }}" >{{ $des->NombreDestino }}</option>
						@endforeach
					</select>
	        </div>
		
			<div class="form-group">
            	<label for="hora_salida">Hora de Salida</label>
            	<input type="time" name="hora_salida"  required="" class="form-control">
            </div>
		
			<div class="form-group">
            	<label for="carril_salida">Carril de Salida</label>
            	<input type="number" name="carril_salida" min="0" max="60" required="" class="form-control" placeholder="Nro de carril">
            </div>
		
			<div class="form-group">
            	<label for="hora_llegada">Hora de Llegada</label>
            	<input type="time" name="hora_llegada"  required="" class="form-control">
            </div>
		
			<div class="form-group">
	            	<button class="btn btn-primary" type="submit">Guardar</button>
	            	<button class="btn btn-danger" type="reset">Cancelar</button>
	            </div>
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		</div>
	</div>
	{!!Form::close()!!}		

@endsection