<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Challenge Acepted')</title>
	<link rel="icon" href="/images/ico.png" type="image/png"> 
	@section('css')
	<link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
	<style type="text/css" media="screen">
    body {
        background-color: #DADADA;

    }
    .iconoChallengeSombraNegro{
    	-webkit-filter: drop-shadow(0px 0px 5px black); 
    	filter: drop-shadow(0px 0px 5px black);"
    }
    .iconoChallengeSombraBlanco{
    	-webkit-filter: drop-shadow(0px 0px 5px white); 
    	filter: drop-shadow(0px 0px 5px white);"
    }
	</style>
	@show
	@section('js')
	<script src="/js/jquery.min.js"></script>
	<script src="/semantic/semantic.js"></script>
	@show
</head>
<body>
@yield('barraMenu')
@yield('contenido')
</body>
</html>