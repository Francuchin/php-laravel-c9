 <?php
    $participacions=$challenge->participacions;
    $usuarios = array();
    $x = 0;
?>
<div class="mdl-cell mdl-card mdl-shadow--4dp">
<div class="mdl-card__title" style="height: 400px; background-image: url('http://lorempixel.com/600/400/city/{{$challenge->id % 10}}')">    
    @if($challenge->user->id != Session::get('user_id'))
    <div class="mdl-card__data-user">
        <img  src="{{$challenge->user->imagenPerfil()}}">
        <div class="data_user_text">
            <a class="linkUser" href="/{{ $challenge->user->id}}">{{ $challenge->user->full_name() }}</a><br>
            <?php
            echo '<a class="timeAgo">'.$timeAgo->inWords($challenge->created_at).'</a>';
            ?>
        </div>
    </div>
    @endif 
    <h2 class="mdl-card__title-text">{{$challenge->title}}</h2>
</div>
<div class="mdl-card__supporting-text">   
    
    {{$challenge->description}}
</div>
<div class="mdl-card__actions mdl-card--border">                    
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--primary"  href="/challenge/{{$challenge->id}}">Ver</a>
<?php if(!$challenge->userParticipa(Session::get('user_id')) && $challenge->user->id != Session::get('user_id')){ ?>
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent"  href="/challenge/{{$challenge->id}}/accepting">¿Aceptas el desafio?</a>
<?php } ?>
</div>
<div class="mdl-card__actions mdl-card--border">                    
    <div class="menu">
        <div class="extra @if(sizeof($participacions)>0) browse @endif">
            <a><i class="green user icon"></i> {{sizeof($participacions)}} Participantes </a>            
        </div>
        <div class="ui popup bottom inverted transition hidden">
                @foreach ($participacions as $p)
                <?php 
                echo '<a style="color:white;" href="/'.$p->user->id.'">'.$p->user->full_name().'</a><br>';
                $x++;
                if($x == 2) break;
                ?>
                @endforeach
            </div>
        </div>
    </div>
</div>