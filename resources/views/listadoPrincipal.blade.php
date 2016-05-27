<?php $timeAgo = new TimeAgo('Etc/GMT', 'es')?>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <div class="mdl-tabs__tab-bar">
      <a href="#principal-panel" class="mdl-tabs__tab is-active">Principal</a>
      <a href="#siguiendo-panel" class="mdl-tabs__tab">Siguiendo</a>
      <a href="#" class="mdl-tabs__tab">+</a>
  </div>
  <div class="mdl-tabs__panel is-active" id="principal-panel">
	<div class="mdl-grid">
	@foreach ($items as $item)
	   @include('challenge.item', array('challenge'=>$item))
	@endforeach
	</div>
  </div>
  <div class="mdl-tabs__panel" id="siguiendo-panel">
	<div class="mdl-grid">
	@foreach ($dasafiosSeguidos as $item)
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