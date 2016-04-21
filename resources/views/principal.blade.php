@extends('cuerpoHTML')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/semantic/components/video.css">
    <style type="text/css">
    .items>.item{
        padding: 10px!important;
        background-color: rgb(200,200,200)!important;
        border:solid 1px rgba(0,0,0,0.3)!important;
        border-radius: 5px!important;
        box-shadow: 0px 0px 2px rgba(0,0,0,0.5)!important;
    }
    @media (min-width: 768px) {
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
        <div class="ui items p60">
            <div class="item">
                <div class="content">
                    <a class="header">Titulo de Participacion</a>
                    <div class="ui segment">
                        <div class="image">
                        <div class="ui video" data-source="youtube" data-id="GvD3CHA48pA" data-icon="video" data-image="http://lorempixel.com/400/200/city"></div>
                        </div>
                    </div>
                    <div class="description">
                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod velit eget libero dapibus pulvinar sed eu velit. Vestibulum congue leo diam, eget rhoncus eros rutrum vitae. Sed ut nunc odio. In non eros. 
                    </div>
                    <div class="extra"><i class="green check icon"></i> 121 Votos </div>
                </div>
            </div>
            <div class="item">
                <div class="content">
                    <a class="header">Titulo de Participacion</a>
                    <div class="ui segment">
                        <div class="image">
                        <div class="ui video" data-source="youtube" data-id="GvD3CHA48pA" data-icon="video" data-image="http://lorempixel.com/400/200/animals">
                        </div></div>
                    </div>
                    <div class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod velit eget libero dapibus pulvinar sed eu velit. Vestibulum congue leo diam, eget rhoncus eros rutrum vitae. Sed ut nunc odio. In non eros. 
                    </div>
                    <div class="extra"><i class="green check icon"></i> 0 Votos </div>
                </div>                
            </div>
            <div class="item">
                <div class="content">
                    <a class="header">Titulo de Participacion</a>
                    <div class="ui segment">
                        <div class="image">
                        <div class="ui video" data-source="youtube" data-id="GvD3CHA48pA" data-icon="video" data-image="http://lorempixel.com/400/200/sports">
                        </div></div>
                    </div>
                    <div class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod velit eget libero dapibus pulvinar sed eu velit. Vestibulum congue leo diam, eget rhoncus eros rutrum vitae. Sed ut nunc odio. In non eros. 
                    </div>
                    <div class="extra"><i class="green check icon"></i> 5 Votos </div>
                </div>
                
            </div>
        </div>
    </div>
@stop  