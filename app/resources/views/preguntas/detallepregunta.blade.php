<?php
/** @var Pregunta $pregunta */
?>
@extends('layout.main')
@section('title')
Pregunta {{ $pregunta->pregunta }}
@stop
@section('contenido')
<section id="detalle">
	<div class="container-fluid">
		<div class="row justify-content-md-center">
			<div class="col-md-6 text-center">
				<img src="{{ url('storage/img/' . $pregunta->users->foto) }}" class="media-object">
				<p class="nombre">- {{ $pregunta->users->name }}</p>
				<p class="badge">{{ $pregunta->categorias->categoria }}</p>
				<p>Planeta: {{ $pregunta->users->planeta }}</p>				
				<p class="pregunta">{{ $pregunta->pregunta }}</p>				
				<p class="respuesta">{{ $pregunta->respuesta }}</p>

				@if(Auth::user()->id_rol == 1)
				<a class="btn btn-primario" href="<?= route('preguntas.formEditar', ['id' => $pregunta->id_pregunta]);?>">Responder</a>
				<a class="btn btn-danger" href="<?= route('preguntas.confirmarEliminar', ['id' => $pregunta->id_pregunta]);?>">Eliminar</a>
				@endif

				<ul>
					@foreach($pregunta->comentarios as $singleComentario)
					<li>
						<p>Usuario: <span>{{ $singleComentario->usuario->name }}</span></p>
						<p>Comentario: {{ $singleComentario->comentario }}</p>
						<p></p>
					</li>
					@endforeach
				</ul>
				<form action="{{ route('preguntas.comentarios', ['id' => $pregunta->id_pregunta]) }}" method="post">
					@csrf
					@method('PUT')

					<textarea type="text" name="comentario" cols="30" rows="10" placeholder="Tenés algo para decir?" value="{{ old('comentario') }}"></textarea>

					<div class="col">
						<button class="">Comentar</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</section>
@stop