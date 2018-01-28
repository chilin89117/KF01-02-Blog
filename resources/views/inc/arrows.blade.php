<div class="pagination-arrow">
  @if($prev_post)
  <a href="{{route('feposts.show', $prev_post->slug)}}" class="btn-prev-wrap">
    <svg class="btn-prev">
      <use xlink:href="#arrow-left"></use>
    </svg>
    <div class="btn-content">
      <div class="btn-content-title">Previous Post</div>
      <p class="btn-content-subtitle">{{$prev_post->title}}</p>
    </div>
  </a>
  @endif

  @if($next_post)
  <a href="{{route('feposts.show', $next_post->slug)}}" class="btn-next-wrap">
    <div class="btn-content">
      <div class="btn-content-title">Next Post</div>
      <p class="btn-content-subtitle">{{$next_post->title}}</p>
    </div>
    <svg class="btn-next">
      <use xlink:href="#arrow-right"></use>
    </svg>
  </a>
  @endif
</div>
