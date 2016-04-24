<div class="item">
    <div class="content">
        <a href="/challenge/{{$challenge->id}}">{{$challenge->title}}</a> 
        @if($challenge->user->id != Session::get('user_id'))
        <a class="linkUser" href="/{{ $challenge->user->id}}">{{ $challenge->user->full_name() }}</a>
        @endif    
        <?php
        echo '<a class="timeAgo">'.$timeAgo->inWords($challenge->created_at).'</a>';
        ?>   
        <div class="descriptionChallenge">
            {{$challenge->description}}
        </div> 
        <div class="ui segment">
            <div class="image">
                <div class="ui video" data-source="youtube" data-id="q53BFc1CN04" data-icon="video" data-image="http://lorempixel.com/400/200/city"></div>
            </div>
        </div>
    <?php
     $participacions=$challenge->participacions;
     $usuarios = array();
     $x = 0;
    ?>
    <div class="menu">
        <div class="extra @if(sizeof($participacions)>0) browse @endif">
            <a><i class="green user icon"></i> {{sizeof($participacions)}} Participantes </a>
            <?php
                if(!$challenge->userParticipa(Session::get('user_id')) && $challenge->user->id != Session::get('user_id')){            
            ?>
            <a href="/challenge/{{$challenge->id}}/accepting" class="ui left pointing black label">¿Aceptas el desafio?</a>
            <?php } ?>
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