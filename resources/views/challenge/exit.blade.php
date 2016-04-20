<form class="ui modal  new challenge" method="post" action="/challenge/new" id="contenido">
<i class="close icon"></i>
  <div class="header">
    Desafio Creado!
  </div>
  <div class="image content" >
    <div class="ui medium image">
      <img src="/images/galeria.png" width="500px" height="500px">
    </div>
    <div class="ui header">Exito</div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Cancelar
    </div>
     <div class="ui right labeled icon button" onclick="javascript:listo();" >
      Listo
      <i class="checkmark icon"></i>
    </div>
  </div>
</form>
<script>
    function listo() {
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onload = function () {
         document.getElementById("contenido").innerHTML = xhttp.responseText;
      };
      xhttp.open("post", "/formularioChallenges", true); 
      xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-CSRF-TOKEN', '<?=csrf_token() ?>');     
      xhttp.send("title=caca&description=algo");
    }
</script>