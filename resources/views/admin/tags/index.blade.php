@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Tags ({{$tags->count()}})</div>
  <div class="panel-body">
    <form action="{{route('tags.store')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="tag">Tag</label>
        <input type="text" name="tag" class="form-control" autofocus>
      </div>
      <button type="submit" name="button" class="btn btn-success">Create Tag</button>
    </form>
    <hr>
    @if($tags->count() > 0)
    <table class="table table-condensed table-hover">
      <thead>
        <tr>
          <th>Tag Name</th>
          <th>Posts</th>
          <th>Show?</th>
          <th>Edit?</th>
          <th>Delete?</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tags as $tag)
        <tr>
          <td>{{$tag->tag}}</td>
          <td>{{$tag->posts->count()}}</td>
          <td>
            <a href="{{route('posts.index', ['tag' => $tag->id])}}" class="btn btn-primary btn-xs">
              <i class="fa fa-files-o"></i>&nbsp;&nbsp;Show
            </a>
          </td>          
          <td>
            <a href="{{route('tags.edit', $tag)}}" class="btn btn-success btn-xs">
              <i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit
            </a>
          </td>
          <td>
            <form action="{{route('tags.destroy', $tag)}}" method="post" onSubmit="return confirm('Are you sure?');">
              {{csrf_field()}}
              {{method_field('delete')}}
              <button type="submit" id="del-btn" name="button" class="btn btn-danger btn-xs">
                <i class="fa fa-trash"></i>&nbsp;&nbsp;Delete
              </button>
            </form>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3>There are no tags.</h3>
    @endif
  </div>
</div>
@endsection
