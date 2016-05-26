<main class="mdl-layout__content">
 <div class="mdl-grid portfolio-max-width">
<?php $timeAgo = new TimeAgo('Etc/GMT', 'es')?>
@foreach ($items as $item)
   @include('challenge.item', array('challenge'=>$item))
@endforeach
</div>
</main>
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