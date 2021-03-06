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
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <h2><b>Nuevo rol</b></h2>
        <br>
        @if (count($errors)>0)
        <div class="my-alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

    {!!Form::open(array('url'=>'mantenimiento/roles', 'method'=>'POST', 'autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="form-group">
        <label for="nombre" style="color: #000;">Nombre</label>
        <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre" 
        onkeyup="this.value = this.value.replace(/\b\w/g, l => l.toUpperCase());" oncopy="return false" onpaste="return false" value="{{ old('nombre') }}" style="color: #000;" maxlength="15">
    </div>
    <div class="form-group">
        <button class="my-button" type="submit"><i class="fa fa-save"><b> Guardar</b></i></button>
    </div>
    {!!Form::close()!!}
    </div>
</div>

</div>
</div>
</div>
</div><!-- /.box -->
<script>
$(document).on('keypress', '#nombre', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
</script>
@endsection