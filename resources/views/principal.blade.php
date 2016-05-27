@extends('cuerpoHTML')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/semantic/components/video.css">
@stop
@section('js')
    @parent
    <script src="/semantic/components/video.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.ui.video').video();
    });
    </script>
@stop
@section('barraMenu')
    @include('menu')
@stop
@section('contenido')
<div class="ui container">
    @include('listadoPrincipal')
</div>
@stop  