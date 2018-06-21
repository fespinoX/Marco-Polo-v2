<?php
/** @var Pregunta[] $preguntas */
?>
@extends('layout.main')
@section('title')
Marco Polo
@stop
@section('contenido')

@if(Session::has('status'))
  @component('microcomponentes.mensajillos', ['tipo' => Session::get('class')])
    {!! Session::get('status') !!}
  @endcomponent
@endif
<section id="user">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-12">
        <h2>Mi usuario</h2>
        <form action="<?= route('user.update', Auth::user()->id);?>" method="post" type="multipart/form-data">
          @csrf
          {{-- method_field('PUT') --}}
          @method('PUT')
          <div class="form-group">
            <label>Nombre:</label><input type="text" value="{{Auth::user()->name}}" name="name">
            @if($errors->has('name'))
            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif

            <label>Planeta:</label><input type="text" value="{{Auth::user()->planeta}}" name="planeta">
            <img src="storage/img/profile/{{Auth::user()->foto}}" alt="foto usuario">
            <input type="file">
          </div>

          <input type="submit">
        </form>
      </div>
  </div>
</section>

@stop