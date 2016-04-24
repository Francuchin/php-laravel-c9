@extends('cuerpoHTML')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/semantic/components/video.css">
    <style type="text/css">
        .container{
               border-left:solid 1px rgba(0,0,0,0.2)!important;
               border-right:solid 1px rgba(0,0,0,0.2)!important;
        }
        .ui.items{
            margin-top: 0px!important;
        }
        .items>.item{
            padding: 10px!important;
            background-color: rgb(200,200,200)!important;
            border:solid 1px rgba(0,0,0,0.3)!important;
            border-radius: 5px!important;
            box-shadow: 0px 0px 2px rgba(0,0,0,0.5)!important;
            margin-left: 10px!important;
        }
        .items>.item:last-of-type{
            margin-bottom: 25px;
        }
       .portada{
        height: 250px; 
        background-image: url('http://i47.tinypic.com/28qrpra.jpg');
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: center;
        background-size: 100% auto;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        border-bottom:solid 2px hsl(0.0, 0.0%, 50%);
       }
       .portada > .datos{
        position: relative;
        top: 120px;
        left: 35%;
        height: 150px;
       }
       .portada > .datos > .usuario{
        margin-left: 1ex;
        visibility: hidden;
        display: inline-block;
        color: white;
        font-size: 2em;
        font-weight: bold;
        font-variant: small-caps;
        font-family: "Times New Roman", Times, serif;
        text-shadow: 2px 0 0 black, -2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, 1px 1px black, -1px -1px 0 black, 1px -1px 0 black, -1px 1px 0 black;
        vertical-align: 5ex;
       }
       .portada > .datos > .usuario > spam{
        font-size: 0.6em;
       }
        .portada > .datos > img{
        width: 150px;
        height: 150px;
        background-color: rgba(255,255,255,0.6);
        border:solid 5px rgba(255,255,255,0.5);
        box-shadow: 0px 0px 2px black;
        display: inline-block; 
        }
        .barraUser{
            margin-top: 0px!important;
            background-color: transparent!important;
            box-shadow: none!important;
            border: none!important;
        }
        @media (min-width: 768px) {
            .portada > .datos{
                left: 5%;
            }
            .portada > .datos > .usuario{
                visibility: visible;
            }
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
    <div class="ui fluid portada">
        <div class="datos">
            <img  src="http://i47.tinypic.com/28qrpra.jpg">  
            <div class="usuario">
                {{$profile->full_name()}} <br>
                <spam>{{$profile->email}}</spam> <br>
                <spam>Desafios creados: {{sizeOf($profile->challenges)}}</spam> <br>
            </div>
        </div>
    </div>
    <?php 
        $items = $profile->challenges('id','desc')->get();
        $selfProfile = (Session::get('user_id') == $profile->id);
    ?>
    @include('user.menu')    
    @include('listadoPrincipal')
</div>
@stop  