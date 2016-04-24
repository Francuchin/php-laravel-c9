<div class="ui menu barraUser">
<?php if(Session::get('user_id') != $profile->id){?>
	<div class="ui right menu fade animated button" tabindex="0">
		<div class="visible content">Seguir</div>
		<div class="hidden content">
			<i class="right arrow icon"></i>
		</div>
	</div>
<?php }else{?>
	<div class="ui right menu fade animated button" tabindex="0">
		<div class="visible content">Editar Perfil</div>
		<div class="hidden content">
			<i class="edit icon"></i>
		</div>
	</div>	
<?php }?>
</div>
