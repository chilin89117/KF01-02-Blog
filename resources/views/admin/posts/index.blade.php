@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Published Posts{{$heading}}&nbsp;({{$posts->count()}})</div>
  <div class="panel-body">
    @if($posts->count() > 0)
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Edit</th>
          <th>Delete?</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <td><img src="{{asset($post->featured)}}" height="42" width="28 "alt="{{$post->title}}"></td>
          <td>{{$post->title}}</td>
          <td>
            <a href="{{route('posts.edit', $post)}}" class="btn btn-info btn-xs">
              <i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit
            </a>
          </td>
          <td>
            <form action="{{route('posts.destroy', $post)}}" method="post">
              {{csrf_field()}}
              {{method_field('delete')}}
              <button type="submit" id="del-btn" name="button" class="btn btn-danger btn-xs">
                <i class="fa fa-trash"></i>&nbsp;&nbsp;Trash
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3>There are no posts.</h3>
    @endif
  </div>
</div>
@endsection
