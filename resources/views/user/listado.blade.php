<?php $timeAgo = new TimeAgo('Etc/GMT', 'es')?>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <div class="mdl-tabs__tab-bar">
      <a href="#desafios-panel" class="mdl-tabs__tab is-active">Desafios</a>
       <?php if(Session::get('user_id') == $profile->id){?>
      <a href="#datos-panel" class="mdl-tabs__tab">Editar Datos</a>                
        <?php }else{?>  
        <a href="#datos-panel" class="mdl-tabs__tab">Datos</a>   
        <?php }?>
      <a href="#" class="mdl-tabs__tab">+</a>
  </div>
  <div class="mdl-tabs__panel is-active" id="desafios-panel">
  <div class="mdl-grid">
  @foreach ($items as $item)
     @include('challenge.item', array('challenge'=>$item))
  @endforeach
  </div>
  </div>
   <?php if(Session::get('user_id') == $profile->id){?>
        <div class="mdl-tabs__panel is-active" id="datos-panel">
          <div class="mdl-grid">
          Editando datos
          </div>
        </div> 
        <?php }else{?>  
          <div class="mdl-tabs__panel is-active" id="datos-panel">
          <div class="mdl-grid">
          Viendo datos
          </div>
        </div> 
        <?php }?>
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