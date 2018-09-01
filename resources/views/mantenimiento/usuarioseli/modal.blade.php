<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$u->id}}">
	{{Form::Open(array('action'=>array('UsuController@destroy', $u->id), 'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="my-modal-header">
			<h2 class="modal-title">Activar Usuario</h2>
		</div>
		<div class="modal-body">
			<p style="font-size:20px"><b>¿Seguro deseas activarlo?</b></p>
		</div>
		<div class="modal-footer">
			<button type="button" class="my-button" data-dismiss="modal"><i class="fa fa-times"><b> Cancelar</b></i></button>
			<button type="submit" class="my-button"><i class="fa fa-check"><b> Activar</b></i></button>
		</div>
		</div>
	</div>
	{{Form::Close()}}
	
	
</div>