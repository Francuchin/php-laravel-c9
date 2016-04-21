@extends('cuerpoHTML')
@section('css')
    @parent
  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
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
    <img class="ui image iconoChallengeSombraNegro" src="/images/ico.png" >
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