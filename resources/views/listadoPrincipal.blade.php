<?php $timeAgo = new TimeAgo('Etc/GMT', 'es')?>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect" >
  <div class="mdl-tabs__tab-bar" id="barra-tabs">
      <a href="#principal-panel" class="mdl-tabs__tab">Principal</a>
      <a href="#siguiendo-panel" class="mdl-tabs__tab is-active">Siguiendo</a>
      <a href="#random-panel" class="mdl-tabs__tab">Random</a>
      <a href="#participando-panel" class="mdl-tabs__tab">participando</a>
      <a href="#" class="mdl-tabs__tab">+</a>
  </div>
  <div class="mdl-tabs__panel is-active" id="siguiendo-panel">
    <div class="mdl-grid">
    @if(isset($dasafiosSeguidos[0]))
      @foreach ($dasafiosSeguidos as $item)
         @include('challenge.item', array('challenge'=>$item))
      @endforeach
    @else
      <p>No hay desafios de usuarios que sigas</p>
    @endif
    </div>
  </div>
  <div class="mdl-tabs__panel" id="participando-panel">
    <div class="mdl-grid">
    @if(isset($participando[0]))
      @foreach ($participando as $item)
         @include('participacion.item', array('participacion'=>$item))
      @endforeach
    @else
      <p>No hay desafios en los que participes</p>
    @endif
    </div>
  </div>
  <div class="mdl-tabs__panel" id="principal-panel">
  	<div class="mdl-grid">
  	@foreach ($items as $item)
  	   @include('challenge.item', array('challenge'=>$item))
  	@endforeach
  	</div>
  </div>
  <div class="mdl-tabs__panel" id="random-panel">
    <div class="mdl-grid">
    @foreach ($random as $item)
       @include('challenge.item', array('challenge'=>$item))
    @endforeach
    </div>
  </div>
</div>
<script>
$('.menu .browse').popup({
    inline   : true,
    hoverable: true,
    position : 'top left',
    delay: {
      show: 300,
      hide: 800
    }
  });
</script>
<script type="text/javascript">

function errorVideo(video){
    var padre = video.parentElement;
    padre.removeChild(video);
    var imagen = document.createElement("img");
    imagen.setAttribute("src", "/images/media.jpg");
    imagen.setAttribute("height","100%");
    imagen.setAttribute("width","100%");
    padre.appendChild(imagen);
}

var videos = document.getElementsByClassName('videosParticipacion');
Array.prototype.forEach.call(videos , function(video, index) {
  var canvas = document.createElement("canvas");
  var video = document.createElement("video");

  video.setAttribute("width","100%");
  video.setAttribute("height","100%");
  video.setAttribute("src", videos[index].getElementsByTagName('source')[0].src);
  video.addEventListener('click', function(){
    controlar(video);
  });
  var padre = videos[index].parentElement;

  videos[index].currentTime = 10;
  canvas.getContext('2d').drawImage(videos[index], 0, 0, videos[index].videoWidth, videos[index].videoHeight);
  video.poster = canvas.toDataURL();
  
  

  padre.removeChild(videos[index]);
  padre.appendChild(video);

});


function controlar(video){
  if(video.paused) {
    video.play();
  }
  else {
    video.pause();
  }
}

</script>