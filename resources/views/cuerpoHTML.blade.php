<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Challenge Accepted')</title>
	<link rel="icon" href="/images/ico.png" type="image/png"> 
	@section('css')
	<link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.grey-blue.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
    .mdl-card__title>.mdl-card__data-user{
        top: 0px;
        left: 0px;
        position: absolute;
        padding: 10px;
        margin: 15px;
        background-color: rgb(68,138,255);
        border: solid 1px rgba(0,0,0,.1);
        box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
    }
    .mdl-card__title>.mdl-card__data-user>.data_user_text{
        display: inline-block;
    }
    .mdl-card__data-user>img{
        height: 50px;
        width: 50px;
        border-radius: 25px;
        border: solid 1px rgba(0,0,0,.1);
        box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
    }
    h2.mdl-card__title-text{
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
	</style>
	@show
	@section('js')
	<script src="/js/jquery.min.js"></script>
	<script src="/semantic/semantic.js"></script>    
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
	@show
</head>
<body>
@yield('barraMenu')
@yield('contenido')
@section('pie')
	<div class="footer"></div>
    <script type="text/javascript">
        var anchors_tabs = document.getElementsByClassName('mdl-tabs__tab');
        Array.prototype.forEach.call(anchors_tabs, function(anchor, index) {
            anchors_tabs[index].href = anchors_tabs[index].dataset.link;
        });
    </script>
@show
</body>
</html>