    <style type="text/css">
    #imgPerfil{
            vertical-align:inherit;
            width: 100%;
            height: 250px;
            background-color: rgba(255,255,255,0);
            border:solid 5px rgba(255,255,255,0.4);
            box-shadow: 0px 0px 2px black;
            display: inline-block; 
        }
      #usertitle{
        background-color: rgb(68,138,255);
        border: solid 1px rgba(0,0,0,.1);
        box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
      }
      .datosUser{
        color: black;
        font-size: 1.2em;
        font-weight: bold;
        font-variant: small-caps;
        font-family: "Times New Roman", Times, serif;
        
      }
      .tablaDatos{
        border-collapse: separate;
        border-spacing:  7px;
      }
    </style>
 <div class="mdl-card mdl-shadow--4dp"  style="margin:10px;">
  <div class="mdl-card__title" id="usertitle">
    <h5 class="mdl-card__title-text">{{$user->full_name()}}</h5>
  </div>
  <div class="mdl-card__media" >
    <img id="imgPerfil" src="{{$user->imagenPerfil()}}">
  </div>
  <div class="mdl-card__supporting-text">
    <div class="datosUser">
    <table class="tablaDatos"><tr>
    <td>
      Desaf&iacute;os: {{count($user->challenges()->get())}}
    </td>
      <td>Participaciones: {{count($user->participaciones()->get())}}</td></tr><tr><td>
      Seguidores: {{count($user->seguidores())}}</td><td>
      Siguiendo: {{count($user->siguiendo())}}</td></tr>
      </table>
    </div>
  </div>
  <div class="mdl-card__actions">
    <a href="/{{$user->id}}">Ir al perfil</a>
  </div>
</div>
