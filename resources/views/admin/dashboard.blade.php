@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading text-center">
        <h5>Number of Users</h5>
      </div>
      <div class="panel-body text-center">
        <h2>{{$num_users}}</h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-success">
      <div class="panel-heading text-center">
        <h5>Number of Published Posts</h5>
      </div>
      <div class="panel-body text-center">
        <h2>{{$num_pub_posts}}</h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-danger">
      <div class="panel-heading text-center">
        <h5>Number of Trashed Posts</h5>
      </div>
      <div class="panel-body text-center">
        <h2>{{$num_trash_posts}}</h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-info">
      <div class="panel-heading text-center">
        <h5>Number of Categories</h5>
      </div>
      <div class="panel-body text-center">
        <h2>{{$num_cats}}</h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-warning">
      <div class="panel-heading text-center">
        <h5>Number of Tags</h5>
      </div>
      <div class="panel-body text-center">
        <h2>{{$num_tags}}</h2>
      </div>
    </div>
  </div>
</div>
@endsection
