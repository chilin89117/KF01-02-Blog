@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Edit Your Profile</div>
  <div class="panel-body">
    <form action="{{route('profile.saveProfile', $user)}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('put')}}
      <div class="row">
        <div class="col-md-9">
          <div class="form-group">
            <label for="name">New Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" autofocus>
          </div>
        </div>
        <div class="col-md-3">
          <img class="pull-right" src="{{asset($user->profile->avatar)}}" height="42" width="28 "alt="{{$user->name}}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="title">New Title</label>
            <input type="text" class="form-control" name="title" value="{{$user->profile->title}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">New Password</label>
            <input id="password" type="password" class="form-control" name="password">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="password-confirm">Confirm New Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="avatar">Upload New Avatar</label>
        <input id="avatar" type="file" class="form-control" name="avatar">
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="facebook">Facebook Profile</label>
            <input id="facebook" type="text" class="form-control" name="facebook" value="{{$user->profile->facebook}}" placeholder="e.g. http://www.facebook.com">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="youtube">Youtube Profile</label>
            <input id="youtube" type="text" class="form-control" name="youtube" value="{{$user->profile->youtube}}" placeholder="e.g. http://www.youtube.com">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="about">About</label>
        <textarea name="about" rows="5" class="form-control">{{$user->profile->about}}</textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Profile</button>
      </div>
    </form>
  </div>
</div>
@endsection
