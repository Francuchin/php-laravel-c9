@extends('cuerpoHTML')
@section('css')
@parent
<style>
  .nuevo.mdl-card {
    margin: auto;
    top: 30px;
    width: 550px;
    height: 600px;
    margin-bottom: 30px;
  }
  .mdl-card__media{
    width: 550px;
    height: 300px;
  }
  .mdl-card__supporting-text{
    height: 350px;
    padding: 10px;
    overflow-y: hidden;
  }
  .mdl-card__actions{
    height: 60px;
  }
  .foto_btn{
    position: absolute;
    border-radius: 3px;
    border: solid 1px rgba(0,0,0,0.2);
    margin-top: 15px;
    margin-left: 15px;
    padding: 3px;
    padding-left: 10px;
    padding-right: 10px;
    box-shadow: 0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12),0 5px 5px -3px rgba(0,0,0,.2);
    box-sizing: border-box;
    background-color: rgba(68,138,255,.7);
    cursor: pointer;
    text-transform: uppercase;
    font-size: 1rem;
  }
  .vista_previa{
    position: absolute;
    z-index: 3;
    height: auto;
    width: 30%;
    margin-top: 45px;
    margin-left: 5px;
    padding: 3px;
    border-radius: 3px;
    border: solid 1px rgba(0,0,0,0.6);
    background-color: white;
    box-shadow: 0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12),0 5px 5px -3px rgba(0,0,0,.2);
    opacity: 0;
    transition: opacity 0.5s;
  }
  .vista_previa>img{
    width: 100%;
    height: 100%;
  }
  #areaTexto{
    width: 100%;
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

function actualizaimagen(){
  document.getElementById('img_previa').setAttribute('src', document.getElementById('captura').value);
  document.getElementById('vista_previa').style.opacity = 0.9;
}

</script>
@stop
@section('barraMenu')
@include('menu')
@stop
@section('contenido')
<div class="nuevo mdl-card mdl-shadow--4dp">
  <div class="mdl-card__media">

<div class="vista_previa" id="vista_previa">
    <img src="" id="img_previa">
</div>

    <div class="video">
      <div type="button" class="foto_btn" > captura </div>
      <video class="video_contenido" src="/videos/video.mp4" poster="/images/media.jpg"></video>
      <input type="range" class="video_rango">
      <div class="video_cargado"></div>
      <input type="hidden" class="captura" id="captura" onchange="javascript:actualizaimagen();"></input>
    </div>
  </div>
  <div class="mdl-card__supporting-text">  
  <div class="mdl-card__title-text mdl-textfield mdl-js-textfield mdl-textfield--floating-label titulo etiqueta">
    <input class="mdl-textfield__input" type="text" name="title" id="title" >
    <label class="mdl-textfield__label" for="sample1">Titulo del desafio</label>
  </div> 
  <div id="areaTexto" class="mdl-card__title-text mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <textarea class="mdl-textfield__input" type="text" rows= "3" name="description" id="description" ></textarea>
    <label class="mdl-textfield__label" for="description">Descripcion del desafio</label>
  </div>
</div>
<div class="mdl-card__actions mdl-card--border">
  <a class="mdl-button mdl-js-button mdl-js-ripple-effect"  onclick="javascript:crearDesafio()">
    Crea tu desafio!
  </a>
  <button class="mdl-button mdl-js-button mdl-js-ripple-effect etiqueta" id="btn_subir">
    <div class="icon material-icons">cloud_upload</div> Subir Multimedia
  </button>
</div>
<div id="progreso"></div>
</div>
@stop 

