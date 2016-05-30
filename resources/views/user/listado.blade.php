<?php $timeAgo = new TimeAgo('Etc/GMT', 'es')?>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <div class="mdl-tabs__tab-bar">
      <a data-link="#desafios-panel" class="mdl-tabs__tab is-active">Desafios</a>
      <?php if(Session::get('user_id') == $profile->id){?>
        <a data-link="#datos-panel" class="mdl-tabs__tab">Editar Datos</a>                
      <?php }else{?>  
        <a data-link="#datos-panel" class="mdl-tabs__tab">Datos</a>   
      <?php }?>
  </div>
  <div class="mdl-tabs__panel is-active" id="desafios-panel">
    <div class="mdl-grid">
    @foreach ($items as $item)
       @include('challenge.item', array('challenge'=>$item))
    @endforeach
    </div>
  </div>
  <div class="mdl-tabs__panel is-active" id="datos-panel">
  @if(Session::get('user_id') == $profile->id)
    <div class="mdl-grid">
      Editando datos
    </div>
 @else  
      <div class="mdl-grid">
        Viendo datos
      </div>
  @endif
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