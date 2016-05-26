<div class="ui card">
  <div class="content">
    <div class="right floated meta">14h</div>
    <div class="left floated meta">
    <img class="ui avatar image" src="{{$participacion->user->imagenPerfil()}}"> {{$participacion->user->full_name()}}
    </div>
  </div>
  <div class="image">
  	<div class="floated">
    {{$participacion->title}}</div>
    <img  src="{{$participacion->video}}">
  </div>
  <div class="content">
    <a class="right floated">
      <i class="heart outline like icon"></i>
      17 likes
    </a>
  </div>
  <!--<div class="extra content">
    <div class="ui large transparent left icon input">
      <i class="comment outline icon"></i>
      <input placeholder="Add Comment..." type="text">
    </div>
  </div>-->
</div>