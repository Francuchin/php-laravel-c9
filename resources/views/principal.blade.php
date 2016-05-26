@extends('cuerpoHTML')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/semantic/components/video.css">
    <style type="text/css">
    .mdl-card__supporting-text{
        height: 100px;
    }
    .mdl-card--border>.menu{
        min-height: 15px;
    }
    .mdl-card--border>.menu>.extra{
        bottom: 3px;
        position: absolute;
    }
    .items>.item{
        padding: 10px!important;
        background-color: rgb(200,200,200)!important;
        border:solid 1px rgba(0,0,0,0.3)!important;
        border-radius: 5px!important;
        box-shadow: 0px 0px 2px rgba(0,0,0,0.5)!important;
    }
    .items>.item:last-of-type{
        margin-bottom: 25px;
    }
    @media (min-width: 768px) {
        .p60 {
            width: 60%;
        }
    }
    </style>
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