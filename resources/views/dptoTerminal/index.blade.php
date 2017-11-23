@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ciudad-Terminal <a href="{{URL::action('DptoTerminalController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
               @foreach ($dptoTerminales as $cat)
				<tr>
					<td>{{ $cat->NombreDestino}}</td>
					<td>
						<a href="{{URL::action('DptoTerminalController@edit',$cat->id_destino)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id_destino}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('dptoTerminal.modal')
				@endforeach
			</table>
		</div>
		{{$dptoTerminales->render()}}
	</div>
</div>

@endsection