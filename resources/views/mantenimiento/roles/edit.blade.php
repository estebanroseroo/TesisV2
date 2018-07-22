@extends ('layouts.admin')
@section('contenido')
<div class="box">
<div class="box-header with-border">
<i class="fa fa-wrench"></i>
<h3 class="box-title"><b>Mantenimiento</b></h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="row">
<div class="col-md-12">
    
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h2>Editar rol</h2>
        @if (count($errors)>0)
        <div class="my-alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

    {!!Form::model($tipousuario,['method'=>'PATCH','route'=>['roles.update', $tipousuario->idtipousuario]])!!}
    {{Form::token()}}
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="Text" name="nombre" class="form-control" value="{{$tipousuario->nombre}}" placeholder="Nombre">
    </div>
    <div class="form-group">
        <button class="my-button" type="submit"><i class="fa fa-save"><b> Guardar</b></i></button>
        <button class="my-button" type="reset"><i class="fa fa-eraser"><b> Limpiar</b></i></button>
    </div>

    {!!Form::close()!!}
    </div>
</div>

</div>
</div>
</div>
</div><!-- /.box -->
@endsection