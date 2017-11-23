<div class="modal" aria-hidden="true" role="dialog" tabindex="-1" id="modal-detalle-{{$cat->id_viajeRuta}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"> <h3>Viaje a {{ $cat->destino}} {<strong>{{ $cat->fecha_viaje}} </strong>}</h3></h4>
			</div>
			<div class="modal-body">
				<h4>
					<strong>ID Viaje:</strong> <i>{{ $cat->id_viajeRuta}}</i> <br>
					<strong>PLACA: </strong> <i>{{ $cat->placa}}</i><br>
					<strong>TIPO-BUS:</strong> <i>{{ $cat->tipoBus}}</i><br>
					<strong>PLAZAS</strong> <i>{{ $cat->plazas}}</i><br>
					<strong>CONDUCTOR</strong> <i>{{ $cat->conductor}}</i><br>
					<strong>ORIGEN</strong> <i>{{ $cat->origen}}</i><br>
					<strong>HORA-SALIDA</strong> <i>{{ $cat->hora_salida}}</i><br>
					<strong>CARRIL</strong> <i>{{ $cat->carril_salida}}</i><br>
					<strong>PRECIO:</strong> <i>{{ $cat->precio_pasaje}}</i><br>
					<strong>HORA-LLEGADA</strong> <i>{{ $cat->hora_llegada}}</i><br>
				</4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
			</div>
		</div>
	</div>
</div>