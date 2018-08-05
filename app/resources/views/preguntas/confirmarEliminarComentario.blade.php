<?php
/** @var Pregunta $pregunta */
?>
@extends('layout.main')
@section('title')
Eliminar Comentario {{ $singleComentario->comentario }}
@stop
@section('contenido')
<section id="edit">
	<div class="container-fluid">
		<div class="row justify-content-md-center">
			<div class="col-sm-6 formu">
				<h2>Confirmar eliminación</h2>
				<p>Borramos este comentario?</p>
				<form method="POST" action="{{ route('preguntas.eliminarcomentario', ['id' => $singleComentario->id_comentario]) }}">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger">Sí!</button>
				</form>
			</div>
		</div>
	</div>
</section>
@stop