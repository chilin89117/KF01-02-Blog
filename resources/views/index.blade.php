@extends('layouts.frontend')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2"> <!-- most recent post -->
        <article class="post post-standard has-post-thumbnail sticky">
          <div class="post-thumb">
            <img src="{{$latest_posts[0]->featured}}" width="200" height="150" alt="{{$latest_posts[0]->title}}">
            <div class="overlay"></div>
            <a href="{{$latest_posts[0]->featured}}" class="link-image js-zoom-image">
              <i class="seoicon-zoom"></i>
            </a>
            <a href="{{route('feposts.show', $latest_posts[0]->slug)}}" class="link-post">
              <i class="seoicon-link-bold"></i>
            </a>
          </div>
          <div class="post__content">
            <div class="post__content-info">
              <h2 class="post__title entry-title text-center">
                <a href="{{route('feposts.show', $latest_posts[0]->slug)}}">{{$latest_posts[0]->title}}</a>
              </h2>
              <div class="post-additional-info">
                <span class="post__date">
                  <i class="seoicon-clock"></i>
                  <time class="published" datetime="{{$latest_posts[0]->created_at}}">
                    {{$latest_posts[0]->created_at->diffForHumans()}}
                  </time>
                </span>
                <span class="category">
                  <i class="seoicon-tags"></i>
                  <a href="{{route('feposts.category', $latest_posts[0]->category_id)}}">
                    {{$latest_posts[0]->category->name}}
                  </a>
                </span>
                <!--
                <span class="post__comments">
                  <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                  6
                </span> -->
              </div>
            </div>
          </div>
        </article>
      </div> <!-- end most recent post -->
    </div>

    <div class="row">
      @for($i=1;$i<=2; $i++) <!-- next 2 recent posts -->
      <div class="col-lg-6">
        <article class="post post-standard has-post-thumbnail sticky">
          <div class="post-thumb">
            <img src="{{$latest_posts[$i]->featured}}" width="200" height="150" alt="{{$latest_posts[$i]->title}}">
            <div class="overlay"></div>
            <a href="{{$latest_posts[$i]->featured}}" class="link-image js-zoom-image">
              <i class="seoicon-zoom"></i>
            </a>
            <a href="{{route('feposts.show', $latest_posts[$i]->slug)}}" class="link-post">
              <i class="seoicon-link-bold"></i>
            </a>
          </div>
          <div class="post__content">
            <div class="post__content-info">
              <h2 class="post__title entry-title text-center">
                <a href="{{route('feposts.show', $latest_posts[$i]->slug)}}">{{$latest_posts[$i]->title}}</a>
              </h2>
              <div class="post-additional-info">
                <span class="post__date">
                  <i class="seoicon-clock"></i>
                    <time class="published" datetime="{{$latest_posts[$i]->created_at}}">
                      {{$latest_posts[$i]->created_at->diffForHumans()}}</time>
                </span>
                <span class="category">
                  <i class="seoicon-tags"></i>
                  <a href="{{route('feposts.category', $latest_posts[$i]->category_id)}}">
                    {{$latest_posts[$i]->category->name}}
                  </a>
                </span>
                <!--
                <span class="post__comments">
                  <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                  6
                </span> -->
              </div>
            </div>
          </div>
        </article>
      </div>
      @endfor <!-- end next 2 recent posts -->
    </div>
  </div>

  <div class="container"> <!-- latest 3 posts from top category  -->
    <div class="offers">
      <div class="row">
        <div class="col-lg-8 col-lg-12 col-sm-12 col-xs-12">
          <div class="heading">
            <p class="h5 heading-title">Most Popular Category: {{$top_cat->name}}</p>
            <div class="heading-line">
              <span class="short-line"></span>
              <span class="long-line"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="case-item-wrap">
          @foreach($top_cat_posts as $tcp)
          <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="case-item">
              <div class="case-item__thumb text-center">
                <img src="{{$tcp->featured}}" width="200" height="150" alt="{{$tcp->title}}">
              </div>
              <h6 class="case-item__title text-center">
                <a href="{{route('feposts.show', $tcp->slug)}}">{{$tcp->title}}</a>
              </h6>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
