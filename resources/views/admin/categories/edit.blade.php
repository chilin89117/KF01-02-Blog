@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Edit the "{{$category->name}}" Category</div>
  <div class="panel-body">
    <form action="{{route('categories.update', $category)}}" method="post">
      {{csrf_field()}}
      {{method_field('put')}}
      <div class="form-group">
        <label for="title">New Name</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}">
      </div>
      <button type="submit" name="button" class="btn btn-success">Update Category</button>
    </form>
  </div>
</div>
@endsection
