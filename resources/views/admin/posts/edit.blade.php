@extends('layouts.app')

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Edit Post</div>
  <div class="panel-body">
    <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('put')}}
      <div class="form-group">
        <img src="{{asset($post->featured)}}" height="42" width="28 "alt="{{$post->title}}">
      </div>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{$post->title}}">
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="featured">New Featured Image</label>
            <input type="file" name="featured" class="form-control" value="{{$post->featured}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category_id">
              @foreach($categories as $cat)
              <option value="{{$cat->id}}"
                {{$post->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="tags">Select Tags</label>
        <div class="well well-sm">
        @if($tags->count() > 0)
        <?php
          $tagTotal = $tags->count();
          $n = 1;
        ?>
          @foreach($tags as $tag)
            @if($n % 4 == 1)
            <div class="row">
            @endif
              <div class="col-md-3">
                <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                   {{$post->tags->find($tag->id) ? 'checked' : ''}}>&nbsp;&nbsp;{{$tag->tag}}</label>
              </div>
            @if($n % 4 == 0 || $n == $tagTotal)
            </div>
            @endif
            <?php $n++; ?>
          @endforeach
        @else
        <a href="{{route('tags.index')}}" class="btn btn-success btn-xs">
          <i class="fa fa-tags"></i>&nbsp;&nbsp;Create Tags
        </a>
        @endif
        </div>
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea id="summernote" name="content" class="form-control">{{$post->content}}</textarea>
      </div>
      <button type="submit" name="button" class="btn btn-success">Update Post</button>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#summernote').summernote({height:150});
  });
</script>
@endsection
