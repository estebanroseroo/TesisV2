@extends ('layouts.admin')
@section('contenido')
<div class="box">
<div class="box-header with-border">
<i class="fa fa-wrench" style="color: #000;"></i>
<h3 class="box-title"><b>Mantenimiento</b></h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="row">
<div class="col-md-12">
	
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h2><b>Facultades </b><a href="facultades/create"><button class="my-button"><i class="fa fa-plus"><b> Agregar</b></i></button></a></h2>
<br>	
@include('mantenimiento.facultades.search')
</div>
</div>

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead class="my-thead">
					<th>Facultad</th>
					<th colspan="2">Opciones</th>
				</thead>

				@foreach($facultades as $f)
				<tr class="my-td">
					<td>{{$f->nombre}}</td>
					<td><a href="{{URL::action('FacultadController@edit', $f->idfacultad)}}"><button class="my-button"><i class="fa fa-pencil"> <b>Editar</b></i></button></a></td>
					@if($f->temporal=='vacio')
					<td><a href="" data-target="#modal-delete-{{$f->idfacultad}}" data-toggle="modal">
					<button class="my-button"><i class="fa fa-trash"> <b>Eliminar</b></i></button></a></td>
					@else
					<td></td>
					@endif
				</tr>
				@include('mantenimiento.facultades.modal')
				@endforeach
			</table>
		</div>
		{{$facultades->render()}}
	</div>
</div>

</div>
</div>
</div>
</div><!-- /.box -->
@endsection
