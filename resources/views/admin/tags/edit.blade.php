@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Edit the "{{$tag->tag}}" Tag</div>
  <div class="panel-body">
    <form action="{{route('tags.update', $tag)}}" method="post">
      {{csrf_field()}}
      {{method_field('put')}}
      <div class="form-group">
        <label for="tag">New Tag</label>
        <input type="text" name="tag" class="form-control" value="{{$tag->tag}}">
      </div>
      <button type="submit" name="button" class="btn btn-success">Update Tag</button>
    </form>
  </div>
</div>
@endsection
