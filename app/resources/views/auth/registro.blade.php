@extends('layout.main')

@section('title')
Registro
@stop
@section('contenido')
<section id="register">
  	<div class="container-fluid">
    	<div class="row justify-content-md-center">
      		<div class="col-sm-6 formu register">
				<h2>Soy nuevo!</h2>
				<form action="{{ route('auth.doRegistro') }}" method="post">
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
			</div>
		</div>
	</div>
</section>
@stop