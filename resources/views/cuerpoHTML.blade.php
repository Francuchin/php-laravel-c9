<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Challenge Accepted')</title>
	<link rel="icon" href="/images/ico.png" type="image/png"> 
	@section('css')
    <!--<link rel="stylesheet" href="/css/material.grey-blue.min.css" />-->
    <link rel="stylesheet" href="/css/material.grey-blue.min.css" media="none" onload="if(media!='all')media='all'">
    <noscript><link rel="stylesheet" href="/css/material.grey-blue.min.css"></noscript>
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
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
        padding: 10px;
        margin: 15px;
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
        text-align: center;
        font-size: 1.5rem;
        padding-left: 15px;
        padding-right: 15px;
        border-radius: 1px;
        background-color: rgb(68,138,255);
        background-size: cover;
        color: white;
        border: solid 1px rgba(0,0,0,.1);
        box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
        position: absolute;
        bottom: 50%;
    }
    .mdl-card__supporting-text{
        height: 100px;
    }
    .mdl-card--border>.menu{
        min-height: 15px;
    }
    .mdl-card--border>.menu>.extra{
        bottom: 5px;
        position: absolute;
    }
    .mdl-card--border>.menu>.extra>a{
        cursor: pointer;
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

    

	</style>
        <style type="text/css">
        /*  estilos para el reproductor */
        .contenedor{
            width: 600px;
            height: 600px;
            margin: auto;
        }
        .video{
            width: 100%;
            box-sizing: border-box;
        }
        .video_contenido{
            width: 100%;
            height: 100%;
        }

        .video_rango {
          z-index: 5;
          opacity: 0;
          -webkit-appearance: none; 
          width: 100%;
          margin: 0px;
          box-sizing: border-box;
          background: transparent; 
          position: relative;
          top: -14px;
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
            top: -30px;
            box-sizing: border-box;
            background-color: hsl(218, 100%, 0%); /*hsl(218, 100%, 63%);*/
            position: relative;
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
            top:calc(50% - 50px);
            transform: translate(-50%, -50%);
            transition: opacity .2s ease-in;
            opacity: .6;
            background-color: rgba(123, 123, 123, 0.2);
            box-shadow: 0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12),0 5px 5px -3px rgba(0,0,0,.2);
        }
        .img_replay{
            background-color: rgba(255, 255, 255, 0.6);
        }
    </style>
	@show
	@section('js')
    <script type="text/javascript" src="/js/all.js" async></script>
   <!--<script type="text/javascript" src="/js/jquery.min.js" async></script>
    <script src="/js/material.min.js" async></script>
    <script type="text/javascript" src="/semantic/semantic.js" async></script> 
    <script type="text/javascript" src="/js/jquery.lazyload.js" async></script>   
    <script type="text/javascript">
       /* $(document).ready(function(e) {
            document.getElementById("cargandoPagina").innerHTML = "<div class='ui active inverted dimmer'><div class='ui large text loader'>Cargando</div></div>";
        });

        $(window).load(function(e) {
           document.getElementById("cargandoPagina").innerHTML="";
        });*/

    </script>-->
     <script type="text/javascript" src="/semantic/semantic.js"></script> 
    
	@show
</head>
<body>
@yield('barraMenu')
@yield('contenido')
<div id="cargandoPagina"></div>
@section('pie')
	<div class="footer"></div>
@show
<script type="text/javascript">
        // javascript para videos
        var videos = document.getElementsByClassName('video');
        Array.prototype.forEach.call(videos , function(video, index) {

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
                var input_captura = null;
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
                });
            }
        });
    </script>
</body>
</html>