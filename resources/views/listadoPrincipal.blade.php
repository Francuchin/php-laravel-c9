<div class="ui items p60">
@foreach ($items as $item)
   @include('challenge.item', array('challenge'=>$item))
@endforeach
</div>