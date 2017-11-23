@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de viaje Rutas <br> <a href="{{URL::action('ViajeRutaController@create')}}"><button class="btn btn-success">Nueva Ruta</button></a></h3>
		@include('viaje.search') 
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Tipo</th>
					<th>Capacidad</th>
					<th>Destino</th>
					<th>Precio</th>
					<th>Opciones</th>
				</thead>
               @foreach ($viajeRutas as $cat)
				<tr>
					<td>{{ $cat->id_viajeRuta}}</td>
					<td>{{ $cat->tipoBus}}</td>
					<td>{{ $cat->plazas}}</td>
					<td>{{ $cat->destino}}</td>
					<td>{{ $cat->precio_pasaje}}</td>
					<td>
						<a href="" data-target="#modal-detalle-{{$cat->id_viajeRuta}}" data-toggle="modal"><i class="glyphicon glyphicon-eye-open"></i></a>

						<a href="{{URL::action('ViajeRutaController@edit',$cat->id_viajeRuta)}}"><button class="btn btn-info">Editar</button></a>

                         <a href="" data-target="#modal-delete-{{$cat->id_viajeRuta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('viaje.modal')
				@include('viaje.detalle')
				@endforeach
			</table>
		</div>
		{{$viajeRutas->render()}}
	</div>
</div>

@endsection