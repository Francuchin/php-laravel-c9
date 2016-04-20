<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <script src="/semantic/semantic.js"></script>
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
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui black image header">
      <i class="users icon"></i>
      <div class="content">
        Ingresar
      </div>
    </h2>
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
    
<script>
  $(document).ready(function() {
      $('.ui.form').form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [{
                  type   : 'empty',
                  prompt : 'Ingrese su Correo'
                },
                {
                  type   : 'email',
                  prompt : 'Ingrese un correo valido'
                }]
            },
            password: {
              identifier  : 'password',
              rules: [{
                  type   : 'empty',
                  prompt : 'Ingrese su contraseña'
                },
                {
                  type   : 'length[4]',
                  prompt : 'Una contraseña valida es de al menos 4 caracteres'
                }
              ]
            }
          }});
    });
  </script>
</body>
</html>


<!--
<div class="container">
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('/') }}">Usuarios</a>
    </div>
</nav>
<h1>Create Usuario :v</h1>

<form method="POST" action="http://php-francuchin.c9users.io/user" accept-charset="UTF-8"><input name="_token" type="hidden" value="yOfX7Eg5pucpoojCjt8nnn9OdIrAjlbylp9RNJtN">
    <label for="first_name">First_name</label> 
    <input class="form-control" name="first_name" type="text" value="{{Input::old('first_name')}}" >
    @if ($errors->has('first_name'))
       <small class=error>{{$errors->first('first_name')}}</small> <br>
    @endif
    <label for="last_name">Last_name</label>
    <input class="form-control" name="last_name" type="text" value="{{Input::old('last_name')}}" >
    @if ($errors->has('last_name'))
       <small class=error>{{$errors->first('last_name')}}</small> <br>
    @endif
    <label for="email">Email</label>
    <input class="form-control" name="email" type="email" id="email" value="{{Input::old('email')}}" >
    @if ($errors->has('email'))
       <small class=error>{{$errors->first('email')}}</small> <br>
    @endif
    <label for="password">password</label>
    <input  class="form-control" name="password" type="password" value="" id="password">
    @if ($errors->has('password'))
       <small class=error>{{$errors->first('password')}}</small> <br>
    @endif
    <input class="btn btn-primary" type="submit" value="Crear User">
</form> 
</div>
-->


<!--
<div class="ui container">
    <link rel="stylesheet" type="text/css" href="semantic/components/video.css">
    <script src="semantic/components/video.js"></script>
    <div class="ui link cards">
        <div class="card">
          <div class="content">
            <div class="right floated meta">14h</div><img class="ui avatar image" src="/images/avatar/large/elliot.jpg"> Elliot </div>
          <div class="image">
            <div class="ui video" data-source="youtube" data-id="GvD3CHA48pA" data-icon="video" data-image="https://static-secure.guim.co.uk/sys-images/Guardian/Pix/pictures/2014/3/16/1394975800825/Babymetal-010.jpg" ></div>
          </div>
          <div class="content"><span class="right floated"> <i class="heart outline like icon"></i> 17 likes </span> <i class="comment icon"></i> 3 comments </div>
          <div class="extra content">
            <div class="ui large transparent left icon input">
              <i class="heart outline icon"></i>
              <input placeholder="Añadir comentario..." type="text">
            </div>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.ui.video').video();
</script>

-->