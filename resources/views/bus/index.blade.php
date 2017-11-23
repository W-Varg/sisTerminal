@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Buses <a href="{{URL::action('BusController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('bus.search') 
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Placa</th>
					<th>Tipo de Bus</th>
					<th>Nro de Asientos</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($buses as $cat)
				<tr>
					<td>{{ $cat->placa}}</td>
					<td>{{ $cat->tipoBus}}</td>
					<td>{{ $cat->plazas}}</td>
					<td>{{ $cat->estado}}</td>
					<td>
						<a href="{{URL::action('BusController@edit',$cat->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('bus.modal')
				@endforeach
			</table>
		</div>
		{{$buses->render()}}
	</div>
</div>

@endsection