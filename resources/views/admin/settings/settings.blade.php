@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Edit Settings</div>
  <div class="panel-body">
    <form action="{{route('settings.update', $settings)}}" method="post">
      {{csrf_field()}}
      {{method_field('put')}}
      <div class="form-group">
        <label for="name">Site Name</label>
        <input type="text" class="form-control" name="sitename" value="{{$settings->site_name}}">
      </div>
      <div class="form-group">
        <label for="contactphone">Contact Phone</label>
        <input type="text" class="form-control" name="contactphone" value="{{$settings->contact_phone}}">
      </div>
      <div class="form-group">
        <label for="contactemail">Contact Email</label>
        <input type="email" class="form-control" name="contactemail" value="{{$settings->contact_email}}">
      </div>
      <div class="form-group">
        <label for="contactaddress">Contact Address</label>
        <input type="text" class="form-control" name="contactaddress" value="{{$settings->contact_address}}">
      </div>
      <div class="form-group">
        <label for="about">About</label>
        <textarea class="form-control" name="about">{{$settings->about}}</textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Settings</button>
      </div>
    </form>
  </div>
</div>
@endsection
