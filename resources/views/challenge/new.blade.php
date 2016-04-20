<form class="ui modal form new challenge" method="post" action="/challenge/new">
  <i class="close icon"></i>
  <div class="header">
    Nuevo Desafio
  </div>
  <div class="image content" id="contenido">
    <div class="ui medium image">
      <img src="/images/galeria.png" width="500px" height="500px">
    </div>
    <div class="description">
    <div class="ui header">Titulo</div>
      <div class="field">
        <input id="title" name="title" >
      </div>
      <div class="ui header">Descripcion</div>
      <div class="field">
        <label>Describe el evento que deseas crear</label>
        <textarea id="description" name="description" rows="2"></textarea>
      </div>
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Cancelar
    </div>
    <div class="ui right labeled icon button" onclick="javascript:enviar()" >
      Listo, crear evento!
      <i class="checkmark icon"></i>
    </div>
  </div>
</form>
  <script>
    function newChallengeModal(){
      $('.ui.modal.new.challenge').modal('show');
    }
    function enviar() {
      var xhttp;
      var title = document.getElementById('title').value;
      var description = document.getElementById('description').value;
      xhttp = new XMLHttpRequest();
      xhttp.onprogress = function () {
         document.getElementById("contenido").innerHTML = "<div class='ui active inverted dimmer'><div class='ui large text loader'>Loading</div></div>";
      };
      xhttp.onload = function () {
         document.getElementById("contenido").innerHTML = xhttp.responseText;
      };
      xhttp.open("post", "/challenge/prueba", true); 
      xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-CSRF-TOKEN', '<?=csrf_token() ?>');     
      xhttp.send("title="+title+"&description="+description);
    }
  </script>