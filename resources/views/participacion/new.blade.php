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
  <div class="ui container">
    @if (count($errors) > 0)
       	<div class="ui error message">
	      @foreach ($errors->all() as $error)
	      	<div class="header">{{$error}}</div>
	      @endforeach
      	</div>
    @endif
    <form class="ui large form" action="/accepting" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_challenge" value="{{ $id_challenge }}">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="trophy icon"></i>
            <input type="text" name="title" id="title" placeholder="Titulo"><br>
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="photo icon"></i>
            <input type="text" name="video" id="video" placeholder="Video"><br>
          </div>
        </div>
        <div class="field">
          <div class="ui input">
            <textarea type="text" name="description" id="description" placeholder="Descripcion"></textarea>
          </div>
        </div>
        <button class="ui medium black button" type="submit"><i class="save icon"></i> Crear</button>
      </div>
    </form>
</div>  
@stop 


