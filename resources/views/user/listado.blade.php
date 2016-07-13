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
    height: 550px;
    position: relative;
  }    


  .btnSeguir, .dejar{
    position: absolute;
    right: 0px;
    top: 302.5px;
  }

.editUser{
  position: absolute;
  left: 120px;
  top: 352px;
  color: black;
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
      <a href="#desafios-panel" id="a_desafios" class="mdl-tabs__tab is-active">
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
        <a href="#editar_datos" id="a_editar" class="mdl-tabs__tab"><i class="edit icon"></i>Editar Datos</a>
      @endif

      <a href="#" id="dejar" class="dejar" onclick="dejarSeguir()"><i class="remove user large red inverted circular icon"></i></a>
      <a href="#" id="btnSeguir"  onclick="seguir()" class="btnSeguir"><i class="add user large green inverted circular icon"></i></a>
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
  <div class="mdl-tabs__panel" id="editar_datos">
    @include('user.edit')
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
 @if (count($errors) > 0)
  <script type="text/javascript">
    $("#desafios-panel").removeClass("is-active");
    $("#editar_datos").addClass("is-active");
    $("#a_desafios").removeClass("is-active");
    $("#a_editar").addClass("is-active");
  </script>
@endif