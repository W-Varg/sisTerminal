<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$cat->id}}">
	{{Form::Open(array('action'=>array('BusController@destroy',$cat->id),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"> <h3>Va Eliminar el Bus..??</h3></h4>
			</div>
			<div class="modal-body">
				<h3>
				<p>{{ $cat->placa }}</p>
				<p>{{ $cat->tipoBus}}</p>
				<p>{{ $cat->plazas}}</p>
				</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>