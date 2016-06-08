 <div class="mdl-card mdl-shadow--4dp"  style="margin:10px;">
  <div class="mdl-card__title">
    <h5 class="mdl-card__title-text">{{$participacion->user->full_name()}}</h5>
  </div>
  <div class="mdl-card__media" >
  <div class="video">
      <video class="video_contenido" src="{{$participacion->video}}" poster="{{$participacion->poster}}"></video>
      <input type="range" class="video_rango">
      <div class="video_cargado" ></div>
  </div>
  <!--<video width="100%" height="100%" class="videosParticipacion" loop>
    <source src="{{$participacion->video}}" type="video/mp4">
    <source src="http://dfcb.github.io/BigVideo.js/vids/dock.mp4" type="video/mp4">
  </video>-->
  </div>
  <div class="mdl-card__supporting-text">
    <h3>{{$participacion->title}}</h3> 
    {{$participacion->description}}
  </div>
  <div class="mdl-card__actions">
    <a href="(URL or function)">Votar</a>
  </div>
</div>
