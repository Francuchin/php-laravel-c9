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
    @include('challenge.new2')
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