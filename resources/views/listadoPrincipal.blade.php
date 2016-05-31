<?php $timeAgo = new TimeAgo('Etc/GMT', 'es')?>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <div class="mdl-tabs__tab-bar">
      <a data-link="#principal-panel" class="mdl-tabs__tab">Principal</a>
      <a data-link="#siguiendo-panel" class="mdl-tabs__tab is-active">Siguiendo</a>
      <a data-link="#random-panel" class="mdl-tabs__tab">Random</a>
      <a data-link="#" class="mdl-tabs__tab">+</a>
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