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
        <div class="extra"><a ><i class="green user icon"></i> {{sizeof($challenge->participacions)}} Participantes </a></div>
    </div>
</div>