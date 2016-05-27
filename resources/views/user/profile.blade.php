@extends('cuerpoHTML')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/semantic/components/video.css">
    <style type="text/css">
        .container{
               /*
               border-left:solid 1px rgba(0,0,0,0.2)!important;
               border-right:solid 1px rgba(0,0,0,0.2)!important;
               */
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
            height: 300px; 
            background-image: url('{{$profile->imagenPortada()}}');
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: center;
            background-size: cover;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
       }
       .portada > .datos{
            position: relative;
            top: 50%;
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
            vertical-align:inherit;
            width: 150px;
            height: 150px;
            background-color: rgba(255,255,255,0);
            border:solid 5px rgba(255,255,255,0.4);
            box-shadow: 0px 0px 2px black;
            display: inline-block; 
        }
        .barraUser{
            margin-top: 0px!important;
            background-color: transparent!important;
            box-shadow: none!important;
            border: none!important;
            top:-100%;
        }
        @media (min-width: 768px) {
            .portada{
                background-size: 100% auto;
            }
            .portada > .datos{
                left: 5%;
            }
            .portada > .datos > .usuario{
                visibility: visible;
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
            <img  src="{{$profile->imagenPerfil()}}">  
            <div class="usuario">
                {{$profile->full_name()}} <br>
                <spam>{{$profile->email}}</spam> <br>
                <spam>Desafios creados: {{sizeOf($profile->challenges)}}</spam> <br>
            </div>
        </div>
        <?php if(Session::get('user_id') == $profile->id){?>
                
        <?php }else{?>  
                
        <?php }?>
    </div>
    <div style="height:20px;"></div>
    <?php 
        $items = $profile->challenges('id','desc')->get();
        $selfProfile = (Session::get('user_id') == $profile->id);
    ?>   
    @include('user.listado')
</div>
@stop  