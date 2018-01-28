@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Create User</div>
  <div class="panel-body">

    <form action="{{route('users.store')}}" method="post">
      {{csrf_field()}}

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}">
      </div>
      <!-- ================================================================= -->
      <div class="form-group">
        <label for="email">E-Mail Address</label>
        <input type="email" class="form-control" name="email" value="{{old('email')}}">
      </div>
      <!-- ================================================================= -->
      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control" name="password">
      </div>
      <!-- ================================================================= -->
      <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
      </div>
      <!-- ================================================================= -->
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Create User</button>
      </div>
    </form>
  </div>
</div>
@endsection
