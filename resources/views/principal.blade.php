@extends('cuerpoHTML')
@section('css')
    @parent
   
@stop
@section('js')
    @parent
@stop
@section('barraMenu')
    @include('menu')
@stop
@section('contenido')
    @parent
    <div class="ui container">
        @include('listadoPrincipal')
    </div>
@stop  
@section('pie')
    @parent
@stop