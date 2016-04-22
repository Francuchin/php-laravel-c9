@extends('cuerpoHTML')
@section('css')
    @parent
@stop
@section('js')
    @parent
    <script>
    function crearDesafio() {
      var xhttp;
      var title = document.getElementById('title').value;
      var description = document.getElementById('description').value;
      xhttp = new XMLHttpRequest();
      xhttp.onprogress = function () {
         document.getElementById("progreso").innerHTML = "<div class='ui active inverted dimmer'><div class='ui large text loader'>Loading</div></div>";
      };
      xhttp.onload = function () {
        window.location.href = '/challenges/'+ xhttp.responseText;
      };
      xhttp.open("post", "/challenge", true); 
      xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-CSRF-TOKEN', '<?=csrf_token() ?>');     
      xhttp.send("title="+title+"&description="+description);
    }
</script>
@stop
@section('barraMenu')
    @include('menu')
@stop
@section('contenido')
  <div class="ui container">
    <form class="ui large form" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="trophy icon"></i>
            <input type="text" name="title" id="title"placeholder="Titulo"><br>
          </div>
        </div>
        <div class="field">
          <div class="ui input">
            <textarea type="text" name="description" id="description" placeholder="Descripcion"></textarea>
          </div>
        </div>
        <div class="ui medium black button" onclick="javascript:crearDesafio()"><i class="save icon"></i> Crear</div>
      </div>
    </form>
    <div id="progreso"></div>
</div>  
@stop 

