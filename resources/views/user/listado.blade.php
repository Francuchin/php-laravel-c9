<?php $timeAgo = new TimeAgo('Etc/GMT', 'es');
  $losigue = false; 
  foreach ($seguidores as $item){
    if($item->id == Session::get('user_id'))
      $losigue = true;
    }
    $userId=Session::get('user_id');
?>
<script src="/js/jquery.min.js" type="text/javascript"></script> 
<style type="text/css">  
  #editar_datos{
    height: 600px;
    border-style: groove;
  }    

  
  .btnSeguir{
    position: absolute;
    right: 120px;
    width: 10.5%;
    top: 352px;
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
.editUser{
  position: absolute;
  left: 120px;
  top: 352px;
  color: black;
}
.dejar {
  width: 10.5%;
  position: absolute;
  right: 120px;
  top: 352px;
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
</style>
  @if ($losigue == false)
 <style type="text/css">
  .dejar{
    visibility: hidden;
  }</style>
  @else
  <style type="text/css">
  .btnSeguir{
    visibility: hidden;
  }</style>
  @endif 
  @if($selfProfile==true)
 <style type="text/css">
  #btnSeguir{
    visibility: hidden; 
  }
  #dejar{
    visibility: hidden;
  }
  </style>
  @endif


<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <div class="mdl-tabs__tab-bar">
      <a href="#desafios-panel" class="mdl-tabs__tab is-active">
      <?php $numDesafios=$items->count(); if($numDesafios==1){?>1 Desaf&iacute;o
      <?php } else{?>
      <strong>{{$numDesafios}}</strong> Desaf&iacute;os
      <?php }?>
      </a>
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
      @if($selfProfile==true)
        <a href="#editar_datos" class="mdl-tabs__tab"><i class="edit icon"></i>Editar Datos</a>
      @endif
      <a href="#" id="dejar" class="dejar" onclick="dejarSeguir()">Dejar de Seguir</a>
      <a href="#" id="btnSeguir"  onclick="seguir()" class="btnSeguir">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seguir</a>
      <!--Cuenta la historia de la programacion que jamas se hizo
      algo tan cochino para alinear un texto :v -->

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
      <p>No hay desaf&iacute;os en los que participes</p>
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
  <div class="mdl-tabs__panel" id="editar_datos">
    
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
function seguir(){ 
  $.ajaxSetup({
  headers:{
      'X-CSRF-Token': $('input[name="_token"]').val()
    }});
  $.ajax({
    url: "user/seguir/{{$profile->id}}/{{$userId}}",
    type: 'POST',
    success: function(datos) {
      var strResponse = JSON.stringify(datos, null, 2);
      var respuesta = strResponse.indexOf("ok");
      if (respuesta>0){
        document.getElementById('dejar').style.visibility  = 'visible';
        document.getElementById('btnSeguir').style.visibility  = 'hidden';
      }
    },
    error: function(data){
      console.log("error");
    }
  });
}
function dejarSeguir(){
  $.ajaxSetup({
  headers:{
      'X-CSRF-Token': $('input[name="_token"]').val()
    }});
  $.ajax({
    url: "user/dejar_seguir/{{$profile->id}}/{{$userId}}",
    type: 'POST',
    success: function(datos) {
      var strResponse = JSON.stringify(datos, null, 2);
      var respuesta = strResponse.indexOf("ok");
      if (respuesta>0){
        document.getElementById('btnSeguir').style.visibility  = 'visible';
        document.getElementById('dejar').style.visibility  = 'hidden';
      }
    },
    error: function(data){
      console.log("error");
    }
  });
}
</script>