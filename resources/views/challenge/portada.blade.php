<div class="portada">
	@if($challenge->video != "null")
	 <div class="video">
	      <video class="video_contenido" src="{{$challenge->video}}" poster="{{($challenge->poster)? $challenge->poster : '/images/media.jpg'}}" preload="none"></video>
	      <input type="range" class="video_rango">
	      <div class="video_cargado" ></div>       
	  </div>
	@else
		<div>
			Sin video
		</div>
	@endif	
</div>
