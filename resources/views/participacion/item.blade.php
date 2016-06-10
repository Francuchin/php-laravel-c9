 <!--<div class="mdl-card mdl-shadow--4dp"  style="margin:10px;">
  <div class="mdl-card__title">
    <h5 class="mdl-card__title-text">{{$participacion->user->full_name()}}</h5>
  </div>
  <div class="mdl-card__media" >
  <div class="video">
      <video class="video_contenido" src="{{$participacion->video}}" poster="{{$participacion->poster}}" preload="none"></video>
      <input type="range" class="video_rango">
      <div class="video_cargado" ></div>
  </div>
  </div>
  <div class="mdl-card__supporting-text">
    <h3>{{$participacion->title}}</h3> 
    {{$participacion->description}}
  </div>
  <div class="mdl-card__actions">
    <a href="(URL or function)">nike</a>
  </div>
</div>
-->
<div class="ui mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-card mdl-card mdl-shadow--4dp ">
<div class="video">
      <video class="video_contenido" src="{{$participacion->video}}" poster="{{$participacion->poster}}" preload="none"></video>
      <input type="range" class="video_rango">
      <div class="video_cargado" ></div>
      <div class="mdl-card__data-user etiqueta">
            <img src="{{$participacion->user->imagenPerfil()}}">
            <div class="data_user_text">
                <a class="linkUser" href="/{{ $participacion->user->id}}">{{ $participacion->user->full_name() }}</a><br>
                <?php
                echo '<a class="timeAgo">'.(new TimeAgo('Etc/GMT', 'es'))->inWords($participacion->created_at).'</a>';
                ?>
            </div>
        </div>
      <h3 class="mdl-card__media-text titulo_participacion etiqueta"><a onclick="javascript:$(this).parent().parent().parent().dimmer('show');">{{$participacion->title}}</a></h3>  
</div>
<div class="ui dimmer participacion">
  <div class="cerrar" onclick="javascript:$(this).parent().parent().dimmer('hide');">
         <i class="material-icons">close</i>
  </div>
  <div class="titulo">
    <h2 >{{$participacion->title}}</h2>
    
  </div>
  <div class="comentario">
     {{$participacion->description}}
     <span> [{{(new TimeAgo('Etc/GMT', 'es'))->inWords($participacion->created_at)}}]</span>
  </div>
  <div class="actions">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--primary" >
       <i class="material-icons">share</i>
    </a>
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--primary" >
       <i class="material-icons">thumb_up</i>
    </a>
 
  </div>
</div>
</div>