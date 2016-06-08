<?php $timeAgo = new TimeAgo('Etc/GMT', 'es');
  $losigue = false; 
  foreach ($seguidores as $item){
    if($item->id == Session::get('user_id'))
      $losigue = true;
    }
    $userId=Session::get('user_id');
?>
<style type="text/css">      
  .btnSeguir{
    position: absolute;
    right: 120px;
    top: 55.5%;
    -webkit-box-shadow:inset 0px 1px 0px 0px #54a3f7;
    box-shadow:inset 0px 1px 0px 0px #54a3f7;
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #007dc1), color-stop(1, #0061a7));
    background:-moz-linear-gradient(top, #007dc1 5%, #0061a7 100%);
    background:-webkit-linear-gradient(top, #007dc1 5%, #0061a7 100%);
    background:-o-linear-gradient(top, #007dc1 5%, #0061a7 100%);
    background:-ms-linear-gradient(top, #007dc1 5%, #0061a7 100%);
    background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#007dc1', endColorstr='#0061a7',GradientType=0);
    background-color:#007dc1;
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    border-radius:3px;
    border:1px solid #124d77;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:13px;
    padding:6px 24px;
    text-decoration:none;
    text-shadow:0px 1px 0px #154682;
  }
.btnSeguir:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0061a7), color-stop(1, #007dc1));
  background:-moz-linear-gradient(top, #0061a7 5%, #007dc1 100%);
  background:-webkit-linear-gradient(top, #0061a7 5%, #007dc1 100%);
  background:-o-linear-gradient(top, #0061a7 5%, #007dc1 100%);
  background:-ms-linear-gradient(top, #0061a7 5%, #007dc1 100%);
  background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0061a7', endColorstr='#007dc1',GradientType=0);
  background-color:#0061a7;
}
.dejar {
  position: absolute;
  right: 120px;
  top: 55.5%;
  -webkit-box-shadow:inset 0px 1px 0px 0px #cf866c;
  box-shadow:inset 0px 1px 0px 0px #cf866c;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #d0451b), color-stop(1, #bc3315));
  background:-moz-linear-gradient(top, #d0451b 5%, #bc3315 100%);
  background:-webkit-linear-gradient(top, #d0451b 5%, #bc3315 100%);
  background:-o-linear-gradient(top, #d0451b 5%, #bc3315 100%);
  background:-ms-linear-gradient(top, #d0451b 5%, #bc3315 100%);
  background:linear-gradient(to bottom, #d0451b 5%, #bc3315 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d0451b', endColorstr='#bc3315',GradientType=0);
  background-color:#d0451b;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius:3px;
  border:1px solid #942911;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:13px;
  padding:6px 24px;
  text-decoration:none;
  text-shadow:0px 1px 0px #854629;
}
.dejar:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bc3315), 
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bc3315', endColorstr='#d0451b',GradientType=0);
  background-color:#bc3315;
}
  @if ($losigue == false)
  .dejar{
    visibility: hidden;
  }
  @else
  .btnSeguir{
    visibility: hidden;
  }
  @endif 
  @if($selfProfile==true)
  .btnSeguir{
    visibility: hidden;
  }
  .dejar{
    visibility: hidden;
  }
  @endif
</style>
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
      <a href="#siguiendo-panel" class="mdl-tabs__tab"><strong>{{sizeof($siguiendo)}}</strong> Siguiendo</a>
      
      <a href="#" id="btnSeguir"  onclick="seguir()" class="btnSeguir">Seguir</a>
      <a href="#" id="dejar" class="dejar" onclick="dejarSeguir()">Dejar de Seguir</a>
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
function seguir(){
  alert('user/seguir/{{$profile->id}}/{{$userId}}');  
  $.ajax({

    url : 'user/seguir/{{$profile->id}}/{{$userId}}',
    type : 'POST',
    success : function() {
      alert("andyvi");
      document.getElementById("dejar").style.visibility = "visible";
      document.getElementById("btnSeguir").style.visibility = "hidden";
    },
    error : function(xhr, status) {
        alert('Disculpe, existió un problema');
    },
});
}
function dejarSeguir(){
  document.getElementById("btnSeguir").style.visibility = "visible";
  document.getElementById("dejar").style.visibility = "hidden";
}
</script>