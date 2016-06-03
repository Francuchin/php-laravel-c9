@extends('cuerpoHTML')
@section('css')
    @parent
    <style>
    .demo-card-square.mdl-card {
      margin: auto;
      top:45px;
      width: 60%;
      height: 500px;
    }
    .demo-card-square > .mdl-card__title {
      color: #fff;
      background: url('/images/media.jpg') rgb(68,138,255);
      background-size: 100% 100%;
    }
    .mdl-textfield__label{
      color: black;
    }
    .media{
      position: absolute;
      height: calc(100% - 200px);
      margin: auto;
      width: 100%;
      left: 0px;
      top: 0px;
      z-index: 3;
    }
    .mdl-textfield--floating-label.is-focused > .mdl-textfield__label{
      color: rgb(65, 65, 65);
    }
    #btn_subir, .mdl-textfield{
      z-index: 5;
    }
    #btn_subir{
      position:absolute;
      left: calc(50% - 100px);
      top:0;
      vertical-align: middle;
    }
    #description{
      max-height: 120px;
      min-height: 120px;
      width: 100%;
    }
    .mdl-card__supporting-text,#areaTexto{
      height: 150px;
      width: 100%
    }
</style>

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
        window.location.href = '/challenge/'+ xhttp.responseText;
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

<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
  <div class="media">
  </div>
  <button class="mdl-button mdl-js-button mdl-js-ripple-effect" id="btn_subir">
    <div class="icon material-icons">cloud_upload</div> Subir Multimedia
  </button>
   <div class="mdl-card__title-text mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="text" name="title" id="title" >
      <label class="mdl-textfield__label" for="sample1">Titulo del desafio</label>
    </div>
  </div>
  <div class="mdl-card__supporting-text">
    <div id="areaTexto" class="mdl-card__title-text mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <textarea class="mdl-textfield__input" type="text" rows= "3" name="description" id="description" ></textarea>
        <label class="mdl-textfield__label" for="description">Descripcion del desafio</label>
    </div>
  </div>
  <br>
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-js-button mdl-js-ripple-effect"  onclick="javascript:crearDesafio()">
      Crea tu desafio!
    </a>
  </div>
  <div id="progreso"></div>
</div>
@stop 

