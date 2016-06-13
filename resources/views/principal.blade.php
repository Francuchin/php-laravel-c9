@extends('cuerpoHTML')
@section('css')
    @parent
<<<<<<< HEAD
    
    <style type="text/css">
        .verUsuarios{
            position: fixed;
            bottom: 10px;
            right: 10px;
        z-index: 1000;
        }    
    </style>
=======
   
>>>>>>> 097ff39cf28b44bff298123f583c44d50905306d
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