<div class="item">
    <div class="content">
        <a class="header" href="/challenges/{{$challenge->id}}">{{$challenge->title}}</a> 
        @if($challenge->user->id != Session::get('user_id'))
        <a>{{$challenge->user->full_name()}}</a>
        @endif        
        <div class="ui segment">
            <div class="image">
                <div class="ui video" data-source="youtube" data-id="GvD3CHA48pA" data-icon="video" data-image="http://lorempixel.com/400/200/city"></div>
            </div>
        </div>
    <div class="description">
        {{$challenge->description}}
    </div>
    <?php
     $participacions=$challenge->participacions;
     $usuarios = array();
     $x = 0;
    ?>
    <div class="menu">
        <div class="extra @if(sizeof($participacions)>0) browse @endif"><a><i class="green user icon"></i> {{sizeof($participacions)}} Participantes </a></div>
            <div class="ui popup bottom inverted transition hidden">
            @foreach ($participacions as $p)
            <?php 
            echo '<a>'.$p->user->full_name().'</a><br>';
            $x++;
            if($x == 2) break;
           ?>
            @endforeach
            </div>
        </div>
    </div>
</div>