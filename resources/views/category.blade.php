@extends('layouts.frontend')

@section('content')
  <div class="content-wrapper">
    <div class="stunning-header stunning-header-bg-lightviolet">
      <div class="stunning-header-content">
        <p class="stunning-header-title">Category: {{$category->name}}</p>
      </div>
    </div>
    <div class="container">
      <main class="main">
        <div class="row medium-padding25">
          @if($posts->count() > 0)
            @foreach($posts as $post)
            <div class="case-item-wrap">
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="case-item">
                  <div class="case-item__thumb text-center">
                    <img src="/{{$post->featured}}" width="200" height="150" alt="{{$post->title}}">
                  </div>
                  <h6 class="case-item__title text-center">
                    <a href="{{route('feposts.show', $post->slug)}}">{{str_limit($post->title,50)}}</a>
                  </h6>
                </div>
              </div>
            </div>
            @endforeach
          @else
          <h3>There are no posts in this category.</h3>
          @endif
        </div>
        <div class="row medium-padding25">
          <div class="col-lg-12">
            <aside aria-label="sidebar" class="sidebar sidebar-right">
              <div  class="widget w-tags">
                <div class="heading text-center">
                  <p class="h5 heading-title">Tags</p>
                  <div class="heading-line">
                    <span class="short-line"></span>
                    <span class="long-line"></span>
                  </div>
                </div>
                <div class="tags-wrap">
                  @foreach($tags as $tag)
                  <a href="{{route('feposts.tag', $tag)}}">{{$tag->tag}}</a>
                  @endforeach
                </div>
              </div>
            </aside>
          </div>
        </div>
      </main>
    </div>
  </div>
@endsection
