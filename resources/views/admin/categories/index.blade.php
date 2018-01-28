@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Categories ({{$categories->count()}})</div>
  <div class="panel-body">
    <form action="{{route('categories.store')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="category">Category</label>
        <input type="text" name="name" class="form-control" autofocus>
      </div>
      <button type="submit" name="button" class="btn btn-success">Create Category</button>
    </form>
    <hr>
    @if($categories->count() > 0)
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Category Name</th>
          <th>Show Posts</th>
          <th>Edit?</th>
          <th>Delete?</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $cat)
        <tr>
          <td>{{$cat->name}}</td>
          <td>
            <a href="{{route('posts.index', ['cat' => $cat->id])}}" class="btn btn-primary btn-xs">
              <i class="fa fa-files-o"></i>&nbsp;&nbsp;Show
            </a>
          </td>          
          <td>
            <a href="{{route('categories.edit', $cat)}}" class="btn btn-success btn-xs">
              <i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit
            </a>
          </td>
          <td>
            <form action="{{route('categories.destroy', $cat)}}" method="post" onSubmit="return confirm('Are you sure?');">
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
    <h3>There are no categories.</h3>
    @endif
  </div>
</div>
@endsection
