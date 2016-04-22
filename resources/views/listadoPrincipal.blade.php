<div class="ui items p60">
@foreach ($items as $item)
   @include('challenge.item', array('challenge'=>$item))
@endforeach
</div>
<script>
$('.menu .browse').popup({
    inline   : true,
    hoverable: true,
    position : 'top left',
    delay: {
      show: 300,
      hide: 800
    }
  });
</script>