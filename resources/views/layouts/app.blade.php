<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include('admin.inc.head')
  <body>
    @include('admin.inc.nav')
    <div class="container">
      <div class="row">
        @auth
        <div class="col-md-3">
          @include('admin.inc.sidebar')
        </div>
        <div class="col-md-9">
          @include('admin.inc.msg')
        @else
        <div class="col-md-8 col-md-offset-2">
        @endauth
          @yield('content')
        </div>
      </div>
    </div>
    @include('admin.inc.footer')
  </body>
</html>
