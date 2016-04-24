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
    <div class="ui equal width center aligned padded grid">
      <div class="row">
      @foreach($challenge->participacions as $p)
        <div class=" four wide column">
            @include('participacion.item',array('participacion'=>$p))
        </div>
      @endforeach
      </div>
    </div>
</div> 
@stop