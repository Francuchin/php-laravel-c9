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
                  },
                  {
                    type   : 'email',
                    prompt : 'Ingrese un correo valido'
                  }]
              },
              password: {
                identifier  : 'password',
                rules: [{
                    type   : 'length[4]',
                    prompt : 'Una contraseña valida es de al menos 4 caracteres'
                  },
                  {
                    type   : 'match[re_password]',
                    prompt : 'Contraseñas no coinciden'
                  }
                ]
              }
            }
          });
      });
    </script>
@stop
@section('barraMenu')
@stop
@section('contenido')
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h1 class="ui black header">
    <img class="ui image iconoChallengeSombraNegro" src="/images/ico.png">
     <div class="content">
        Registro
      </div>
    </h1>
    @if (count($errors) > 0)
       <div class="ui error message">
      @foreach ($errors->all() as $error)
      <div class="header">{{$error}}</div>
      @endforeach
      </div>
    @endif
    <form class="ui large form" method="post" action="/user" >
      <div class="ui stacked segment">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="fields">
          <div class="eight wide field">
            <div class="ui left icon input">
              <i class="write icon"></i>
              <input type="text" name="first_name" placeholder="Nombre" value="{{Input::old('first_name')}}" >
            </div>
          </div>
          <div class="eight wide field">
            <div class="ui left icon input">
              <i class="write icon"></i>
              <input type="text" name="last_name" placeholder="Apellido" value="{{Input::old('last_name')}}" >
            </div>
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address" value="{{Input::old('email')}}" >
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="re_password" placeholder="Repetir Password">
          </div>
        </div>
        <div class="ui fluid large black submit button">Aceptar</div>
      </div>
      <div class="ui error message"></div>
    </form>
    <div class="ui message">
      ¿Ya estas registrado? <a href="/">Ingresar</a>
    </div>
  </div>
</div>  
@stop 
