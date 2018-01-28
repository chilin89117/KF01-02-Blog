@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Trashed Posts ({{$tPosts->count()}})</div>
  <div class="panel-body">
    @if($tPosts->count() > 0)
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Restore?</th>
          <th>Permanently Delete?</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tPosts as $tPost)
        <tr>
          <td><img src="{{asset($tPost->featured)}}" height="42" width="28" alt="{{$tPost->title}}"></td>
          <td>{{$tPost->title}}</td>
          <td>
            <form action="{{route('posts.restore', $tPost->id)}}" method="post">
              {{csrf_field()}}
              <button type="submit" name="button" class="btn btn-info btn-xs">
                <i class="fa fa-undo"></i>&nbsp;&nbsp;Restore
              </button>
            </form>
          </td>
          <td>
            <form action="{{route('posts.permDelete', $tPost->id)}}" method="post" onSubmit="return confirm('Are you sure?');">
              {{csrf_field()}}
              {{method_field('delete')}}
              <button type="submit" id="del-btn" name="button" class="btn btn-danger btn-xs">
                <i class="fa fa-trash"></i>&nbsp;&nbsp;Delete
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3>There are no trashed posts.</h3>
    @endif
  </div>
</div>
@endsection
