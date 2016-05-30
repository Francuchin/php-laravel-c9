@extends('cuerpoHTML')
@section('css')
    @parent
  <style type="text/css">
    body {
      background-image: url(/images/fondo.jpg);
      background-size: 100% 100%;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
      padding: 5px;
      border-radius: 3px;
      background-color: rgb(68,138,255)!important;
    }
    .button{
      background-color: rgb(68,138,255)!important;      
    }
    .message, .column, .stacked, .button{
      border: solid 1px rgba(0,0,0,.1)!important;
      box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2)!important;    
    }
    .input{
      box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2)!important; 
    }
  </style>
@stop
@section('js')
    @parent
    <script>
      $(document).ready(function() {
          $('.ui.form').form({
              fields: {
                email: {
                  identifier  : 'email',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Ingrese su correo'
                    }]
                },
                password: {
                  identifier  : 'password',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Ingrese su contraseña'
                    }]
                }
              }});
        });
      </script>
@stop
@section('barraMenu')
@stop
@section('contenido')
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h1 class="ui black header">
    <img class="ui image " src="/images/ico.png" >
     <div class="content">
        Ingresar
      </div>
    </h1>
      @if ($errors->has('mensaje'))
       <div class="ui error message">
         <div class="header">{{$errors->first('mensaje')}}</div>
       </div>
      @endif
    <form class="ui large form" method="post" action="/user/login">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address"><br>
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="ui fluid large black submit button">Login</div>
      </div>
      <div class="ui error message"></div>
    </form>
    <div class="ui message">
      ¿No estas registrado? <a href="user/signin">Nuevo registro</a>
    </div>
  </div>
</div>  
@stop 