<header class="header" id="site-header">
  <div class="container">
    <div class="header-content-wrapper">
      <div class="logo">
        <div class="logo-text">
          <div class="logo-title">
            <a href="{{route('feposts.index')}}">{{$settings->site_name}}</a>
          </div>
        </div>
      </div>
      <nav id="primary-menu" class="primary-menu">
        <a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
          <span id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: hidden">
            <svg width="1000px" height="1000px">
              <path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
              <path id="pathE" d="M 300 500 L 700 500"></path>
              <path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
            </svg>
          </span>
        </a>
        <ul class="primary-menu-menu" style="overflow: hidden;">
          @foreach($categories as $cat)
          <li><a href="{{route('feposts.category', $cat)}}">{{$cat->name}}</a></li>
          @endforeach
          @auth
          <li>
            <div class="widget w-tags">
              <div class="tags-wrap">
                <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w-tags">Logout</a>
              </div>
            </div>
          </li>
          <form id="logout-form" action="{{route('logout')}}" method="post">
            {{csrf_field()}}
          </form>
          @else
          <li>
            <div class="widget w-tags">
              <div class="tags-wrap">
                <a href="{{route('login')}}">Login</a>
                <a href="{{route('register')}}">Register</a>
              </div>
            </div>
          </li>
          @endauth
        </ul>
      </nav>
      <ul class="nav-add">
        <li class="search search_main" style="color: black; margin-top: 5px;">
          <a href="#" class="js-open-search">
            <i class="seoicon-loupe"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</header>
