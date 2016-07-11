<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect" >
  <div class="mdl-tabs__tab-bar" id="barra-tabs">
      <a href="#nuevoDesafio-panel" class="mdl-tabs__tab nuevoDesafioBotonLlamativo">Nuevo Desafio</a>
      <a href="#principal-panel" class="mdl-tabs__tab">Principal</a>
      <a href="#siguiendo-panel" class="mdl-tabs__tab is-active">Siguiendo</a>
      <a href="#random-panel" class="mdl-tabs__tab">Random</a>
      <a href="#participando-panel" class="mdl-tabs__tab">participando</a>
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
  <div class="mdl-tabs__panel" id="nuevoDesafio-panel">
  <div class="mdl-grid">
      @include('challenge.new2')
      <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect ver-guia">
            <i class="material-icons">help</i>
      </button>
      <ul class="guia">
          <li><i class="material-icons">ondemand_video</i> Sube tu video (.avi, .mp4, .flv)</li>
          <li><i class="material-icons">photo</i> Selecciona la captura del video a mostrar</li>
          <li><i class="material-icons">title</i> Añade un titulo</li>
          <li><i class="material-icons">create</i> Describelo tu desafio</li>
          <li><i class="material-icons">done</i> Acepta y listo!</li>
      </ul>
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