@extends('layout.main')

@section('title')
Registro
@endsection
<?php // @endsection hace lo mismo que @stop ?>

@section('contenido')
<h1>Soy nuevo!</h1>

<form action="{{ route('auth.doRegistro') }}" method="post">
	<?php // ambas líneas crean el input para el CSRF ?>
	<?php // {{ csrf_field() }} ?>
	@csrf

	<div class="form-group">
		<label for="name">Nombre: </label>
		<input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
		@if($errors->has('name'))
			<div class="alert alert-danger">{{ $errors->first('name') }}</div>
		@endif
	</div>

	<div class="form-group">
		<label for="planeta">Planeta: </label>
		<input type="text" id="planeta" name="planeta" class="form-control" value="{{ old('planeta') }}">
		@if($errors->has('planeta'))
			<div class="alert alert-danger">{{ $errors->first('planeta') }}</div>
		@endif
	</div>	

	<div class="form-group">
		<label for="email">E-mail: </label>
		<input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
		@if($errors->has('email'))
			<div class="alert alert-danger">{{ $errors->first('email') }}</div>
		@endif
	</div>

	<div class="form-group">
		<label for="password">Password: </label>
		<input type="password" id="password" name="password" class="form-control">
		@if($errors->has('password'))
			<div class="alert alert-danger">{{ $errors->first('password') }}</div>
		@endif
	</div>

	<div class="form-group">
		<label for="password_confirmation">Confirmar Password: </label>
		<input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
	</div>

	<button class="btn btn-primary btn-block">Registrar</button>
</form>
@stop