<?php $timeAgo = new TimeAgo('Etc/GMT', 'es')?>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <div class="mdl-tabs__tab-bar">
      <a href="#desafios-panel" class="mdl-tabs__tab is-active">
      <?php $numDesafios=$items->count(); if($numDesafios==1){?>1 Desaf&iacute;o
      <?php } else{?>
      <strong>{{$numDesafios}}</strong> Desaf&iacute;os
      <?php }?>
      </a>
      <!--<//?php if(Session::get('user_id') == $profile->id){?>
        <a data-link="#datos-panel" class="mdl-tabs__tab">Editar Datos</a>                
      <//?php }else{?>  
        <a data-link="#datos-panel" class="mdl-tabs__tab">Datos</a>   
      <//?php }?>
      -->
      <a href="#participaciones-panel" class="mdl-tabs__tab">
      <?php $numPart=$participando->count(); if ($numPart==1){?>
      <strong>1</strong> Participaci&oacute;n
      <?php } else{?>
      <strong>{{$numPart}}</strong> Participaciones
      <?php }?>
      </a>
      <a href="#seguidores-panel" class="mdl-tabs__tab">
      <?php $tams = sizeof($seguidores); if($tams==1){?><strong>1</strong> Seguidor
      <?php } else{?>
      <strong>{{$tams}}</strong> Seguidores
      <?php }?>
      </a>
      <a href="#siguiendo-panel" class="mdl-tabs__tab"><strong>{{sizeof($seguidores)}}</strong> Siguiendo</a>
  </div>
  <div class="mdl-tabs__panel is-active" id="desafios-panel">
    <div class="mdl-grid">
    @foreach ($items as $item)
       @include('challenge.item', array('challenge'=>$item))
    @endforeach
    </div>
  </div>
  <div class="mdl-tabs__panel" id="participaciones-panel">
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
  <div class="mdl-tabs__panel" id="seguidores-panel">
    <div class="mdl-grid">
    @foreach ($seguidores as $item)
       @include('user.item', array('user'=>$item))
    @endforeach
    </div>
  </div>
  <div class="mdl-tabs__panel" id="siguiendo-panel">
    <div class="mdl-grid">
    @foreach ($siguiendo as $item)
       @include('user.item', array('user'=>$item))
    @endforeach
    </div>
  </div>
  <!--div class="mdl-tabs__panel is-active" id="datos-panel">
  @if(Session::get('user_id') == $profile->id)
    <div class="mdl-grid">
      Editando datos
    </div>
 @else  
      <div class="mdl-grid">
        Viendo datos
      </div>
  @endif
  </div--> 
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