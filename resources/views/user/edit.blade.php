 <style>
div.vertical-line{
	position: absolute;
  width: 1px;
  background-color: #b3d4fc;
  height: 80%;
  top: 10%;
  float: left;
  border: 1px ridge #b3d4fc;
  border-radius: 2px;
}
#cambiarcol{
	border: none !important;
	background-color: rgb(255,255,255);
}
h2{
	text-align: center;
}
hr{
	 width: 109%; 
	 margin-left: 2%;
}

#submit{
	position: relative;
	margin-left: 20px;
	margin-top: 262px;
}
.input_labels{
	width: 60px !important;
}

.button{
  background-color: rgb(68,138,255)!important;      
  border: solid 1px rgba(0,0,0,.1)!important;
  box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2)!important;    
}
.input{
  box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2)!important; 
}
.error>.list{
  font-weight: bold;
}
.error{
  position: absolute !important;
  top: -7%;
  width: 34.8%;
}
.row{

}
 </style>
 <script type="text/javascript" src="/js/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.form').form({
            fields: {
              email: {
                identifier  : 'email',
                rules: [{
                    type   : 'empty',
                    prompt : 'Ingrese su correo'
                  },
                  {
                    type   : 'email',
                    prompt : 'Ingrese un correo v&aacute;lido'
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
@if (count($errors) > 0)
       <div class="ui error message">
      @foreach ($errors->all() as $error)
      <div class="header">{{$error}}</div>
      @endforeach
      </div>
    @endif
 <div class="row">
 	<form class="form" method="post" action="/user/update" >
	<div class="segment">	
    <div class="four columns uno">
	    <div id="cambiarcol" class="vertical-line">
	    	
	    </div>
		<h2>Cambiar datos</h2>
	  	<div class="field">
		<span class="input_labels">&nbsp;&nbsp;Nombre:&nbsp;&nbsp;&nbsp;</span>
		    <div  id="first_name" class="ui left icon input">
		      <i class="write icon"></i>
		      <input type="text" name="first_name" placeholder="Nombre" value="{{$profile->first_name}}" >
		    </div>
	  	</div>
	  	<hr/>
		<br>
	  	<div class="field">
	    <span class="input_labels">&nbsp;&nbsp;Apellido:&nbsp;&nbsp;&nbsp;</span>
		    <div class="ui left icon input">
		      <i class="write icon"></i>
		      <input type="text" name="last_name" id="last_name" placeholder="Apellido" value="{{$profile->last_name}}" >
		    </div>
	  	</div>
	  	<hr>
	  	<br>
	    <div class="field">
	    <span class="input_labels">&nbsp;&nbsp;Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	      <div class="ui left icon input">
	        <i class="user icon"></i>
	        <input type="text" name="email" id="email" placeholder="E-mail address" value="{{$profile->email}}" >
	      </div>
	    </div>
	    <hr>
	    <br>
		
    </div>
    <div id="caca" class="four columns">
       <div class="vertical-line"></div>
        <h2>Cambiar contraseña</h2>
		<div class="field">
		<span class="input_labels">&nbsp;&nbsp;Contraseña:&nbsp;&nbsp;&nbsp;</span>
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="********">
          </div>
        </div>
        <hr>
	    <br>
        <div class="field">
        <span class="input_labels">&nbsp;&nbsp;Repetir:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="re_password" placeholder="********">
          </div>
        </div>
		<hr>
	    <br>
	<button id="submit" class="ui fluid large black submit button">Guardar</button>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="four columns">
    <div class="vertical-line"></div>
      <h2>Cambiar im&aacute;genes</h2>
    </div>
    </div>
    </form>
  </div>