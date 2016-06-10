<style type="text/css">
	
	.foto_btn{
    position: absolute;
    z-index: 3;
    border-radius: 3px;
    border: solid 1px rgba(0,0,0,0.2);
    margin-top: 15px;
    margin-left: 15px;
    padding: 3px;
    padding-left: 10px;
    padding-right: 10px;
    box-shadow: 0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12),0 5px 5px -3px rgba(0,0,0,.2);
    box-sizing: border-box;
    background-color: rgba(68,138,255,.7);
    cursor: pointer;
    text-transform: uppercase;
    font-size: 1rem;
  }
  .vista_previa{
    position: absolute;
    z-index: 3;
    height: auto;
    width: 30%;
    margin-top: 45px;
    margin-left: 5px;
    padding: 3px;
    border-radius: 3px;
    border: solid 1px rgba(0,0,0,0.6);
    background-color: white;
    box-shadow: 0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12),0 5px 5px -3px rgba(0,0,0,.2);
    opacity: 0;
    transition: opacity 0.5s;
  }
  .vista_previa>img{
    width: 100%;
    height: 100%;
  }
</style>
<div class="mdl-cell mdl-card mdl-shadow--4dp" id="nuevo">
<div id="progreso"></div>
	<form id="formulario_subir_video" >
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="mdl-card__media" id="crear_challenge_video">
	 <div style="min-height:303px; border-bottom:solid 1px rgba(0,0,0,.1);">   
	 	<div style="transform:position(50%, 50%);">
			<label for="subir_video">
	            <div class="mdl-button mdl-js-button mdl-js-ripple-effect">
			    	<div class="icon material-icons">cloud_upload</div>
			  	</div>
	            <input id="subir_video" type='file' name="subir_video" accept="video/mp4" hidden>
	        </label>
		</div>
	 </div>
	</div>
	</form>
	<form id="formulario_crear_desafio" method="post" action="/challenge/" autocomplete="off">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="captura" id="form_input_captura" value="" >
	<input type="hidden" name="video" id="form_input_video" value="" >	
	<div class="mdl-card__supporting-text" style="
											overflow:hidden;
											height:auto;">    
	   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	    <input class="mdl-textfield__input" type="text" name="title" id="nuevo_desafio_title" required>
	    <label class="mdl-textfield__label" for="nuevo_desafio_title">Titulo</label>
	   </div>  
	   <div class="mdl-card__title-text mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style=" width: 100%;">
	    <textarea class="mdl-textfield__input" type="text" name="comentario" id="nuevo_desafio_description" required></textarea>
	    <label class="mdl-textfield__label">Comentario</label>
	  </div>
	</div>
	<div style="
			display:inline-block;
			height:28px; 
			position: absolute;
			width: 100%;
			bottom: 5px;
			transform: translate(25%, -5px);
			">
		<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent" >Aceptar</button> 
		<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary">Cancelar</a>
	</div>
	</form>
</div>
