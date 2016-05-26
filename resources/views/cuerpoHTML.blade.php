<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Challenge Accepted')</title>
	<link rel="icon" href="/images/ico.png" type="image/png"> 
	@section('css')
	<link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.grey-pink.min.css" />
    


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
    .linkUser{
    	color: hsla(0, 0%, 25%, 0.6);
    	font-size: 0.8em;
    }
    .linkUser:before{
    	content: " ~ ";
    }
    .linkUser:hover{
    	color: hsla(0, 0%, 25%, 0.9);
    	font-size: 0.9em;
    }
    .descriptionChallenge{
    	font-style: oblique;
    }
    .timeAgo{
    	color: hsla(0, 0%, 25%, 0.6);
    	font-size: 0.65em;
    }
    .timeAgo:before{
    	content: " ~ ";
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
	<div style="bottom: 0px;">
		
	</div>
@show
</body>
</html>