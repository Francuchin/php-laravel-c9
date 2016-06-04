@extends('cuerpoHTML')
@section('css')
    @parent
    <style type="text/css" media="screen">
        .portada{
            width: 100%;
            height: 250px;
            background-color: rgb(219, 158, 39);
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
    <div class="mdl-grid">
     @foreach($challenge->participacions as $p)
            @include('participacion.item',array('participacion'=>$p))
      @endforeach
    </div>
</div> 
@stop