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
      <div class="col-md-6 text-center formu">    
        <div class="row justify-content-md-center">
          <div class="col-md-12">
            <h2>Mi usuario</h2>
            <form action="<?= route('user.update', Auth::user()->id);?>" method="post" enctype="multipart/form-data">
              @csrf
              {{-- method_field('PUT') --}}
              @method('PUT')
              <div class="form-group">
                <label class="campito">Nombre</label><input class="campitoescr" type="text" value="{{Auth::user()->name}}" name="name">
                @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif

                <label class="campito">Planeta</label><input class="campitoescr" type="text" value="{{Auth::user()->planeta}}" name="planeta">

                <label class="campito">Foto</label>
                <br>
                <img id="fotoprev" src="storage/img/{{Auth::user()->foto}}" alt="foto usuario">
                <input type="file" name="foto" id="fotosrc" class="fotilla">
              </div>

              <input type="submit" class="btn btn-primario">
            </form>
          </div>
      </div>
    </div>
  </div>
</section>

@stop