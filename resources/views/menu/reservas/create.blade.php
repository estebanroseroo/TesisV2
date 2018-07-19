@extends ('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h2>Nuevo usuario</h2>
		@if (count($errors)>0)
		<div class="my-alert">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

	{!!Form::open(array('url'=>'mantenimiento/usuarios', 'method'=>'POST', 'autocomplete'=>'off'))!!}
	{{Form::token()}}
    {{ csrf_field() }}
	<div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

         <div class="col-md-6">
         <input id="name" type="text" placeholder="Nombre" 
        onkeyup="this.value = this.value.replace(/\b\w/g, l => l.toUpperCase());" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name">
        </div>
     </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

        <div class="col-md-6">
        <input id="email" type="email" placeholder="Correo" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">
        </div>
    </div>

     <div class="form-group row">
        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

        <div class="col-md-6">
        <input id="telefono" type="number" placeholder="Teléfono" class="form-control" name="telefono">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Rol</label>
        <div class="col-md-6">
        <select id="idtipousuario" name="idtipousuario" class="form-control">
            @foreach ($roles as $rol=>$value)
            <option value="{{$rol}}">{{$value}}</option>
            @endforeach
        </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Facultad</label>
        <div class="col-md-6">
        <select id="idfacultad" name="idfacultad" class="form-control">
            <option value="">--- Seleccione una facultad ---</option>
            @foreach ($facultades as $fac=>$value)
            <option value="{{$fac}}">{{$value}}</option>
            @endforeach
        </select>
        </div>
    </div>

     <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Carrera</label>
        <div class="col-md-6">
        <select id="idcarrera" name="idcarrera" class="form-control">
            <option value="">--- Seleccione una carrera ---</option>
        </select>
        </div>
        <span id="loader"><i class="fa fa-spinner fa-2x fa-spin"></i></span>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

        <div class="col-md-6">
        <input id="password" type="password" placeholder="Contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

        <div class="col-md-6">
        <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation">
        </div>
    </div>

	<div class="form-group">
		<button class="my-button" type="submit"><i class="fa fa-save"><b> Guardar</b></i></button>
		<button class="my-button" type="reset" id="bt_limpiar"><i class="fa fa-eraser"><b> Limpiar</b></i></button>
	</div>

	{!!Form::close()!!}
	</div>
</div>
@endsection
