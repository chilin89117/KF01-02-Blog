@extends('layouts.frontend')
@section('content')
  <div class="container">
    <article class="post post-standard-details">
      <div class="post-thumb">  <!-- featured img -->
        <img src="/{{$post->featured}}" width="300" height="225" alt="{{$post->title}}">
      </div>
      <div class="post__content">
        <div class="post-additional-info">
          <div class="post__author author vcard">Posted by
            <div class="post__author-name fn">
              <a href="{{route('feposts.user', $post->user->id)}}" class="post__author-link">{{$post->user->name}}</a>
            </div>
          </div>
          <span class="post__date">
            <i class="seoicon-clock"></i>
            <time class="published" datetime="{{$post->created_at}}">
              {{$post->created_at->diffForHumans()}}
            </time>
          </span>
          <span class="category">
            <i class="seoicon-tags"></i>
              <a href="{{route('feposts.category', $post->category_id)}}">{{$post->category->name}}</a>
          </span>
        </div>
        <div class="post__content-info"> <!-- post title and content -->
          <h4>{{$post->title}}</h4>
          <p class="post__text">{!!$post->content!!}</p>
          <div class="widget w-tags">
            <div class="tags-wrap">
              @foreach($post->tags as $tag)
              <a href="{{route('feposts.tag', $tag)}}" class="w-tags-item">{{$tag->tag}}</a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="socials text-center">
        <p>Share</p>
        <div class="addthis_inline_share_toolbox"></div>
      </div>
    </article>
    @include('inc.author')
    @include('inc.arrows')
    @include('inc.comments')
  </div>
@endsection
