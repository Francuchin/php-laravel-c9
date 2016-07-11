@extends('cuerpoHTML')
@section('css')
    @parent
    <style type="text/css" media="screen">
        .portada{
            margin: auto;
            width: 80%;
            height: auto;
        }
        .barraMenuDesafio{

        }
    </style>
@stop
@section('js')
    @parent
@stop
@section('barraMenu')
    @include('menu')
@stop
@section('contenido')
<div class="ui container">
    @include('challenge.portada')
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect" >
        <div class="mdl-tabs__tab-bar" id="barra-tabs">
            <a href="#datos-panel" class="mdl-tabs__tab">Datos</a>
            <a href="#participaciones-panel" class="mdl-tabs__tab">Participaciones</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="datos-panel">
            <div class="mdl-grid">
<ul class="mdl-cell mdl-card mdl-shadow--4dp">
  <li class="mdl-list__item">USUARIO</li>
  <li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
      <img class="mdl-list__item-avatar" src="{{$challenge->user->imagenPerfil()}}">
      <span>{{$challenge->user->full_name()}}</span>
    </span>
  </li>
</ul>
<ul class="mdl-cell mdl-card mdl-shadow--4dp">
  <li class="mdl-list__item">DESAFIO</li>
  <li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
      <span>{{$challenge->title}}</span>
      <span class="mdl-list__item-text-body">
        {{$challenge->description}}
      </span>
    </span>
  </li>
</ul>
            </div>
        </div>
        <div class="mdl-tabs__panel" id="participaciones-panel">
            <div class="mdl-grid">
             @foreach($challenge->participacions as $p)
                    @include('participacion.item',array('participacion'=>$p))
              @endforeach
            </div>
        </div>
    </div>
</div> 
@stop