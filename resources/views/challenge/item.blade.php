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
        <div class="extra"><i class="green user icon"></i> 0 {{--$participantes--}} Participantes </div>
    </div>
</div>