 <?php
    $participacions=$challenge->participacions;
    $x = 0;
    ($challenge->poster != "null")? $poster =$challenge->poster : $poster="/images/media.jpg";
?>
<div class="mdl-cell mdl-card mdl-shadow--4dp">
<div class="ui dimmer nueva_participacion participacion "><!-- Nueva Participacion -->
  <div class="cerrar" onclick="javascript:$(this).parent().parent().dimmer('hide');">
         <i class="material-icons">close</i>
  </div>
  <div class="formulario_nueva_participacion">
      <div class="ui inverted dimmer">
        <div class="ui text loader">Subiendo Video</div>
      </div>
      <div class="nueva_participacion_video">
        <label>
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--primary upload" >
               <i class="material-icons">file_upload</i>
            </a>
            <input type="file" class="input_subir_video_participacion" hidden>
        </label>
      </div>
    <form method="post" action="accepting" style="padding:5px;"  autocomplete="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="video" class="nueva_participacion_video_txt">
      <input type="hidden" name="captura" class="nueva_participacion_captura_txt">
      <input type="hidden" name="id_challenge" value="{{$challenge->id}}">
      <label>Titulo
        <input class="mdl-textfield__input" type="text" name="title" required>
      </label>
      <label>Comentario
        <textarea class="mdl-textfield__input" type="text" name="comentario" required></textarea>
      </label>
      <input type="submit" name="" value="aceptar">  
    </form>
  </div>  
</div><!-- FIN Nueva Participacion -->
<div class="mdl-card__media">
@if($challenge->video != "null")
 <div class="video">
      <video class="video_contenido" src="{{$challenge->video}}" poster="{{$poster}}" preload="none"></video>
      <input type="range" class="video_rango">
      <div class="video_cargado" ></div>
       @if($challenge->user->id != Session::get('user_id'))
        <div class="mdl-card__data-user etiqueta">
            <img src="{{$challenge->user->imagenPerfil()}}">
            <div class="data_user_text">
                <a class="linkUser" href="/{{ $challenge->user->id}}">{{ $challenge->user->full_name() }}</a><br>
                <?php
                echo '<a class="timeAgo">'.(new TimeAgo('Etc/GMT', 'es'))->inWords($challenge->created_at).'</a>';
                ?>
            </div>
        </div>
        @endif
        <h2 class="mdl-card__media-text etiqueta">{{$challenge->title}}</h2>         
  </div>
@else
 @if($challenge->user->id != Session::get('user_id'))
        <div class="mdl-card__data-user etiqueta">
            <img src="{{$challenge->user->imagenPerfil()}}">
            <div class="data_user_text">
                <a class="linkUser" href="/{{ $challenge->user->id}}">{{ $challenge->user->full_name() }}</a><br>
                <?php
                echo '<a class="timeAgo">'.$timeAgo->inWords($challenge->created_at).'</a>';
                ?>
            </div>
        </div>
        @endif
        <h2 class="mdl-card__media-text etiqueta">{{$challenge->title}}</h2> 
<img src="images/media.jpg" width="100%" height="auto">
@endif
</div>
<div class="mdl-card__supporting-text">      
    {{$challenge->description}}
</div>
<div class="mdl-card__actions mdl-card--border">                    
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--primary"  href="/challenge/{{$challenge->id}}">Ver</a>
<?php if(!$challenge->userParticipa(Session::get('user_id')) && $challenge->user->id != Session::get('user_id')){ ?>
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" onclick="javascript:$(this).parent().parent().dimmer('show')">¿Aceptas el desafio?</a>
<?php } ?>
</div>
<div class="mdl-card__actions mdl-card--border">
	<div class="menu">
        <div class="extra @if(sizeof($participacions)>0) browse @endif">
            <a><i class="green user icon"></i> {{sizeof($participacions)}} Participantes </a>            
        </div>
        <div class="ui popup bottom inverted transition hidden">
                <?php 
                foreach ($participacions as $p){  
                    if($x == 2) {
                        echo '<a style="color:white;" href="/challenge/'.$challenge->id.'">...</a><br>';
                        break;
                    }              
                    echo '<a style="color:white;" href="/'.$p->user->id.'">'.$p->user->full_name().'</a><br>';
                    $x++;                    
                }
                ?>
        </div>
    </div>
</div>
</div>