@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Active Users</div>
  <div class="panel-body">
    @if($users->count() > 0)
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Joined</th>
          <th style="text-align:center">Admin?</th>
          <th style="text-align:center">Suspend?</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>
            <img src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}"
                 width="28" height="42">
          </td>
          <td style="padding-top:15px">{{$user->name}}</td>
          <td style="padding-top:15px">{{$user->created_at->toFormattedDateString()}}
          <td style="padding-top:15px;text-align:center">
            <form action="{{route('users.adminToggle', $user)}}" method="post">
              {{csrf_field()}}
              @if($user->admin)
              <button type="submit" name="button" class="btn btn-danger btn-xs" {{auth()->id()==$user->id?'disabled':''}}>
                <i class="fa fa-user-o"></i>&nbsp;&nbsp;Revoke Privilege
              </button>
              @else
              <button type="submit" name="button" class="btn btn-success btn-xs" {{auth()->id()==$user->id?'disabled':''}}>
                <i class="fa fa-user-o"></i>&nbsp;&nbsp;Grant Privilege
              </button>
              @endif
            </form>
          </td>
          <td style="padding-top:15px;text-align:center">
            <form action="{{route('users.destroy', $user)}}" method="post" onSubmit="return confirm('Are you sure?');">
              {{csrf_field()}}
              {{method_field('delete')}}
              <button type="submit" id="del-btn" name="button" class="btn btn-danger btn-xs" {{auth()->id()==$user->id?'disabled':''}}>
                <i class="fa fa-trash"></i>&nbsp;&nbsp;Suspend
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$users->links()}}
    @else
    <h3>There are no users.</h3>
    @endif
  </div>
</div>
@endsection
