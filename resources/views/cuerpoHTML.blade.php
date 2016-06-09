<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Challenge Accepted')</title>
	<link rel="icon" href="/images/ico.png" type="image/png"> 
	@section('css')
    <!--<link rel="stylesheet" href="/css/material.grey-blue.min.css" />-->
    <link rel="stylesheet" href="/css/material.grey-blue.min.css" >
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link rel="stylesheet" href="/css/icon.css">
	<style type="text/css" media="screen">
    .container{
               /*
               border-left:solid 1px rgba(0,0,0,0.2)!important;
               border-right:solid 1px rgba(0,0,0,0.2)!important;
               */
    }
    .ui.fixed.menu{
        background-color: rgb(68,138,255);
        border: solid 1px rgba(0,0,0,.1);
        box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
    }
    .ui.menu .item::before {
        position: fixed;
    }
    .ui.menu:not(.secondary):not(.text):not(.tabular):not(.borderless) > .container > .item:first-child:not(.right):not(.borderless) {
        border-left: none;
    }
    .ui.fixed.menu>.ui.container>.item{
        color: white;
    }
    .iconoChallengeSombraBlanco{
    	-webkit-filter: invert(99%);
    	filter: invert(99%);
    }
    @media screen and (min-width: 840px) {
        .mdl-cell{
            margin: 8px;
            width: calc(50% - 16px);
        }
    }
    .video>.mdl-card__data-user{
        top: 0px;
        left: 0px;
        position: absolute;
        padding: 5px;
        box-sizing: border-box;
        margin: 5px;
        background-color: rgb(68,138,255);
        border: solid 1px rgba(0,0,0,.1);
        box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
    }
    .video>.mdl-card__data-user>.data_user_text{
        display: inline-block;
    }
    .mdl-card__data-user>img{
        height: 50px;
        width: 50px;
        border-radius: 25px;
        border: solid 1px rgba(0,0,0,.1);
        box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
    }
    h2.mdl-card__media-text{
        font-size: 1.5rem;
        padding-left: 15px;
        padding-right: 15px;
        border-radius: 1px;
        background-color: rgb(68,138,255);
        color: white;
        border: solid 1px rgba(0,0,0,.1);
        box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
        position: absolute;
        bottom: 25%;
    }
    .mdl-card__supporting-text{
        height: 100px;
        overflow-y: auto;
    }

    .linkUser{
    	font-size: 1em;
        cursor: pointer;
        color: white;
        text-align: right;
    }
    .linkUser:hover{
    	color: hsla(0, 0%, 25%, 0.9);
    }
    .descriptionChallenge{
    	font-style: oblique;
    }
    .timeAgo{
    	color: hsla(0, 0%, 25%, 0.6);
    	font-size: 0.65em;
        cursor: pointer;
        text-align: right;
        float: right;
    }
    .footer{
        bottom: 0px;
        padding: 3px;
        text-align: center;
    }
    .mdl-card__media{
        background-color:transparent;
    }
    /*.mdl-card__actions{
        height: 35px;
    }*/   
    #nuevo>.mdl-card__supporting-text{
        overflow:hidden;
    }
	</style>
        <style type="text/css">
        /*  estilos para el reproductor */

        .video{
            width: 100%;
            position: relative;
            box-sizing: border-box;
        }
        .video_contenido{
            width: 100%;
            height: 100%;
        }
        .video_rango {
          position: absolute;
          opacity: 0;
          z-index: 5;
          width: 100%;
          margin: 0px;
          padding: 0;
          box-sizing: border-box;
          background: transparent; 
          left: 0;
          bottom:0;
          cursor: pointer;

        }

        .video_rango:focus {
          outline: none; 
        }

        .video:hover>.video_cargado{
          opacity: 1;
        }
        .video_cargado{
            transition: opacity .6s ease-in, width .2s linear;
            opacity: 0;
            height: 5px;
            width: 0;
            left: 0;
            padding: 0;
            margin: 0;
            bottom: 0;
            box-sizing: border-box;
            background-color: hsl(218, 100%, 0%); /*hsl(218, 100%, 63%);*/
            position: absolute;
            z-index: 3;
        }
        .img_play>img,
        .img_replay>img{
            width: 100%;
            height: 100%;
        }
        .img_play, .img_replay{
            position: absolute;
            border-radius: 100%;
            border: double 5px rgba(12, 100, 100, .9);
            height: 100px;
            width: 100px;
            left: 50%;
            top: 44%;
            transform: translate(-50%, -50%);
            transition: opacity .2s ease-in;
            opacity: .6;
            background-color: rgba(123, 123, 123, 0.2);
            box-shadow: 0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12),0 5px 5px -3px rgba(0,0,0,.2);
        }
        .img_replay{
           /* background-color: rgba(255, 255, 255, 0.6);*/
        }
    </style>
	@show
	@section('js')
    <!--<script type="text/javascript" src="/js/all.js" async></script>-->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script src="/js/material.min.js"></script>
     <script type="text/javascript" src="/semantic/semantic.js"></script> 
    
	@show
</head>
<body>
@yield('barraMenu')
@yield('contenido')
@section('pie')
	<div class="footer"></div>
@show
<script type="text/javascript">
        // javascript para videos
        var videos = document.getElementsByClassName('video');
        Array.prototype.forEach.call(videos, crearVideo);

        function crearVideo(video, index) {

            var media = video.getElementsByTagName('video')[0];             // video
            var rango = video.getElementsByClassName('video_rango')[0];     // input range
            var cargado = video.getElementsByClassName('video_cargado')[0]; // barra que muestra tiempo
            var foto_btn = video.getElementsByClassName('foto_btn')[0];
            var etiquetas = video.getElementsByClassName('etiqueta');

            var div_r = document.createElement('div');
            var img_r = document.createElement('img');
            img_r.setAttribute('src', '/images/replay.png');
            div_r.classList.add('img_replay');
            div_r.appendChild(img_r);

            var div_p = document.createElement('div');
            var img_p = document.createElement('img');
            img_p.setAttribute('src', '/images/play.png');
            div_p.classList.add('img_play');
            div_p.appendChild(img_p);

            //video.insertBefore(div_r, video.firstChild);
            video.insertBefore(div_p, video.firstChild);

            rango.setAttribute("value", media.currentTime); 
            rango.setAttribute("max", "0");
            rango.setAttribute("min", "0");
            rango.setAttribute("step", "0.1");

            media.addEventListener('play',function(){
                rango.max = media.duration;
                if(video.getElementsByClassName('img_replay')[0]){
                    video.removeChild(div_r);
                }
                ocultar_etiquetas();
            });
            media.addEventListener('timeupdate',function(){
                rango.value = media.currentTime; 
                var porcentajeCargado = (media.currentTime)*100/(media.duration);
                cargado.style.width = porcentajeCargado +"%";
                cargado.style.backgroundColor = "hsl(218, 100%, "+  (87 - ((porcentajeCargado)*50)/media.duration) +"%)";
                if(video.getElementsByClassName('img_replay')[0]){
                    video.removeChild(div_r);
                }
            });
            media.addEventListener('durationchange',function(){
                rango.max = media.duration;     
            });
            media.addEventListener('ended',function(){
                rango.value = 0;
                video.insertBefore(div_r, video.firstChild);
                mostrar_etiquetas();
            });
            function ocultar_etiquetas(){               
                if(etiquetas[0]){
                    Array.prototype.forEach.call(etiquetas , function(etiqueta, index) {
                        etiqueta.style.visibility = 'hidden';
                    });
                }
            }
            function mostrar_etiquetas(){                
                if(etiquetas[0]){
                    Array.prototype.forEach.call(etiquetas , function(etiqueta, index) {
                        etiqueta.style.visibility = 'visible';
                    });
                }
            }
            function play_pausa(){
                if(media.paused) {
                    media.play();
                    cargado.style.opacity = null;
                    div_p.style.opacity = 0;
                    ocultar_etiquetas();
                }
                else {
                    media.pause();
                    cargado.style.opacity = 1;
                    div_p.style.opacity = 1;
                    mostrar_etiquetas();
                }
            }
            div_p.addEventListener('click',play_pausa);
            media.addEventListener('click',play_pausa);
            div_r.addEventListener('click',function(){
                play_pausa();
            });            

            rango.addEventListener('input', function(e) {               
                media.currentTime = rango.value;
            });

            if(foto_btn){
                var input_captura = video.getElementsByClassName('captura')[0];
                foto_btn.addEventListener('click',function(){                  
                    var canvas = document.createElement("canvas");
                    canvas.setAttribute("width", media.videoWidth);
                    canvas.setAttribute("height", media.videoHeight);
                    canvas.getContext('2d').drawImage(media, 0, 0, media.videoWidth, media.videoHeight);
                    if(!input_captura){
                        input_captura = document.createElement("input");
                        input_captura.classList.add("captura");
                        input_captura.setAttribute("name","captura");
                        input_captura.setAttribute("type","hidden");
                        input_captura.setAttribute("value", canvas.toDataURL());
                        video.appendChild(input_captura);
                    }else{
                        input_captura.setAttribute("value", canvas.toDataURL());
                    }
                    if(input_captura.hasAttribute('onchange'))
                        input_captura.onchange(); 
                });
            }
        }
    </script>


    <script type="text/javascript" >
    /*----------------NUEVO DESAFIO-----------------*/
  if(!! document.getElementById("subir_video"))  
    document.getElementById("subir_video").addEventListener("change", subir_video, false);

  function subir_video() {
    document.getElementById("progreso").innerHTML = "<div class='ui active inverted dimmer'><div class='ui large text loader'>Subiendo Video</div></div>";

    var formData = new FormData(document.querySelector('#formulario_subir_video'));
    var request = new XMLHttpRequest();
    
    request.onreadystatechange = function(e) {
        console.log("onreadystatechange: ",request.readyState ,request.response);

    };
    
    request.addEventListener('load', function() {
        if(this.status == 200){
            var json = JSON.parse(this.response);
            if(!!json.resultado){
                if(json.resultado == 'ok'){
                    document.getElementById("progreso").innerHTML = "";
                    add_video(json.ruta);
                }else{
                    document.getElementById("progreso").innerHTML = "<div class='ui active dimmer'><div class='ui large text loader'>ERROR 3: no se pudo subir el video</div></div>";
                }
            }else{
                console.log(this);
               document.getElementById("progreso").innerHTML = "<div class='ui active dimmer'><div class='ui large text loader'>ERROR 2: no se pudo subir el video</div></div>"; 
            }
        }else{
            document.getElementById("progreso").innerHTML = "<div class='ui active dimmer'><div class='ui large text loader'>ERROR 1: no se pudo subir el video</div></div>";
        }
    });
    request.open("POST", "/subir_video", true);
    request.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");
    request.send(formData);

  }

    function actualizaimagen(){
      document.getElementById('img_previa').setAttribute('src', document.getElementById('captura').value);
      document.getElementById('form_input_captura').setAttribute('value', document.getElementById('captura').value);
      document.getElementById('vista_previa').style.opacity = 0.9;
    }

    function add_video(ruta_video){

        var crear_challenge_video = document.getElementById('crear_challenge_video');
        var formulario_crear_desafio = document.getElementById('formulario_crear_desafio');
        document.getElementById('form_input_video').setAttribute('value', ruta_video);
        var vista_previa = document.createElement('div');
        var img_vista_previa = document.createElement('img');

        var video = document.createElement('div');
        var foto_btn = document.createElement('div');
        var video_media = document.createElement('video');
        var video_rango = document.createElement('input');
        var video_cargado = document.createElement('div');
        var captura = document.createElement('input');
        var ruta = document.createElement('input');

        vista_previa.classList.add('vista_previa');
        //img_vista_previa.classList.add('img_previa');
        video.classList.add('video');
        foto_btn.classList.add('foto_btn');
        video_media.classList.add('video_contenido');
        video_rango.classList.add('video_rango');
        video_cargado.classList.add('video_cargado');
        captura.classList.add('captura');

        foto_btn.innerHTML="captura";

        vista_previa.setAttribute('id','vista_previa');
        img_vista_previa.setAttribute('id','img_previa');
        captura.setAttribute('id','captura');
        captura.setAttribute('name','captura');
        ruta.setAttribute('name', 'video');
        video_media.setAttribute('id', 'nuevo_desafio_video');
        video_rango.setAttribute('type','range');
        captura.setAttribute('type', 'hidden');
        ruta.setAttribute('type', 'hidden');
        ruta.setAttribute('value', ruta_video);
        video_media.setAttribute('src', ruta_video);
        captura.setAttribute('onchange', 'javascript:actualizaimagen()');

        vista_previa.appendChild(img_vista_previa);
        video.appendChild(foto_btn);
        video.appendChild(video_media);
        video.appendChild(video_rango);
        video.appendChild(video_cargado);
        video.appendChild(ruta);
        video.appendChild(captura);
        
        crear_challenge_video.innerHTML = "";
        crear_challenge_video.appendChild(vista_previa);
        crear_challenge_video.appendChild(video);
        crearVideo(video);
    }
</script>
</body>
</html>