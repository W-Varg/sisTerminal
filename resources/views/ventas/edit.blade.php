@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Actualizar Bus : {{ $busId->placa }}</h3>
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
			{!!Form::model($busId,['method'=>'PATCH','route'=>['administrar.bus.update',$busId->id]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="placa">Placa</label>
            	<input type="text" name="placa" class="form-control" value="{{ $busId->placa }}" placeholder="Numero de Placa..." required="">
            </div>
            <div class="form-group">
            	<label for="tipoBus">Tipo de Bus</label>
            	<select name="tipoBus" class="form-control" value="{{ $busId->tipoBus }}" style="background-color: #ccebff" >
					  <option value="Normal" >Normal</option>
					  <option value="Semicama" >SemiCama</option>
					  <option value="Bus-Cama">Bus-Cama</option>
				</select>
            </div>
            <div class="form-group">
            	<label for="numeroAsientos">Nro de Asientos</label>
            	<input type="number" name="numeroAsientos" min="0" value="{{ $busId->plazas }}" max="60" required="" class="form-control" placeholder="Nro de Asientos...">
            </div>
            <div class="form-group">
            	<label for="disponible">Estado de Servicio</label>
	            	<select name="disponible" class="form-control" value="{{ $busId->estado }}" style="background-color: #ccebff">
					  <option value="disponible">Disponible</option>
					  <option value="No Disponible">No Disponible</option>
					</select>
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