<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
  @include('inc.head')
  <body>
    <div class="content-wrapper">
      @include('inc.header')
      @yield('content')
    </div>
    @include('inc.subscribe')
    @include('inc.footer')
    @include('inc.svg')
    @include('inc.search')
    @include('inc.scripts')
  </body>
</html>
