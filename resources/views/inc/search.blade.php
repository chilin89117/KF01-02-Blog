<div class="overlay_search">
  <div class="container">
    <div class="row">
      <div class="form_search-wrap">
        <form action="{{route('feposts.search')}}" method="post">
          {{csrf_field()}}
          <input class="overlay_search-input" name="search" placeholder="Type and hit Enter..." type="text">
          <a href="#" class="overlay_search-close">
            <span></span>
            <span></span>
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
