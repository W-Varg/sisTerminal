@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Conductores <a href="{{URL::action('ConductorController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Salario</th>
					<th>Opciones</th>
				</thead>
               @foreach ($conductores as $cat)
				<tr>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->telefono}}</td>
					<td>{{ $cat->salario}}</td>
					<td>
						<a href="{{URL::action('ConductorController@edit',$cat->id_conductor)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id_conductor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('conductor.modal')
				@endforeach
			</table>
		</div>
		{{$conductores->render()}}
	</div>
</div>

@endsection