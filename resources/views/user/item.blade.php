   <link rel="stylesheet" type="text/css" href="/semantic/components/video.css">
    <style type="text/css">
    #imgPerfil{
            vertical-align:inherit;
            width: 100%;
            height: 200px;
            background-color: rgba(255,255,255,0);
            border:solid 5px rgba(255,255,255,0.4);
            box-shadow: 0px 0px 2px black;
            display: inline-block; 
        }
    </style>
 <div class="mdl-card mdl-shadow--4dp"  style="margin:10px;">
  <div class="mdl-card__title">
    <h5 class="mdl-card__title-text">{{$user->full_name()}}</h5>
  </div>
  <div class="mdl-card__media" >
    <img id="imgPerfil" src="{{$user->imagenPerfil()}}">
  </div>
  <div class="mdl-card__supporting-text">
    <h3>user</h3> 
    
  </div>
  <div class="mdl-card__actions">
    <a href="(URL or function)">Ver</a>
  </div>
</div>
