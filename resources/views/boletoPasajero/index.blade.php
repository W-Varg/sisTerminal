@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pasajeros del Bus <br> <a href="{{URL::action('BoletaPasajeroController@create')}}"><button class="btn btn-success">Adicionar pasajero</button></a></h3>
		@include('boletoPasajero.search') 
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>ID viaje</th>
					<th>Asiento</th>
					<th>Nombre Del Pasajero</th>
					<th>Estado</th>
					<th>fecha Registro</th>
					<th>Opciones</th>
				</thead>
               @foreach ($boletos as $obj)
				<tr>
					<td>{{ $obj->id_boleto}}</td>
					<td>{{ $obj->id_viaje}}</td>
					<td>{{ $obj->asiento}}</td>
					<td>{{ $obj->nombrePasajero}}</td>
					<td>{{ $obj->estado}}</td>
					<td>{{ $obj->fecha}}</td>
					<td>
						<a href="{{URL::action('BoletaPasajeroController@edit',$obj->id_boleto)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$obj->id_boleto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('boletoPasajero.modal')
				@endforeach
			</table>
		</div>
		{{$boletos->render()}}
	</div>
</div>

@endsection