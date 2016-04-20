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
         document.getElementById("contenido").innerHTML = "<div class='ui active inverted dimmer'><div class='ui large text loader'>Loading</div></div>";
      };
      xhttp.onload = function () {
         document.getElementById("contenido").innerHTML = xhttp.responseText;
      };
      xhttp.open("post", "/challenge/prueba", true); 
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
    sadgsd
  </div>
@stop 

