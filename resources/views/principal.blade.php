@extends('cuerpoHTML')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/semantic/components/video.css">
    <style type="text/css">
        .verUsuarios{
            position: fixed;
            bottom: 10px;
            right: 10px;
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
@if(sizeOf($usersSiguiendo) > 0)
<div class="verUsuarios">
    <button id="demo-menu-top-right" class="mdl-button mdl-js-button">Siguiendo</button>
    <ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="demo-menu-top-right">
     @foreach($usersSiguiendo as $us)
      <li class="mdl-menu__item"><a href="/{{$us->id}}" class="mdl-badge mdl-badge--no-background" data-badge="{{$us->challenges->count()}}">{{$us->full_name()}}</a></li>
    @endforeach
    </ul>
</div>
@endif
@stop  