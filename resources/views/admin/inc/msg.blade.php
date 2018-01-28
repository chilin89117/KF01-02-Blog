@if(count($errors)>0)
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="fa fa-times-circle fa-lg" aria-hidden="true"></i>
  </button>
  @foreach($errors->all() as $err)
  <p><i class="fa fa-thumbs-o-down fa-lg"></i>&nbsp;&nbsp;{{$err}}</p>
  @endforeach
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="fa fa-times-circle fa-lg" aria-hidden="true"></i>
  </button>
  <i class="fa fa-thumbs-o-up fa-lg">&nbsp;&nbsp;</i>{{session('success')}}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="fa fa-times-circle fa-lg" aria-hidden="true"></i>
  </button>
  <i class="fa fa-thumbs-o-down fa-lg"></i>&nbsp;&nbsp;{{session('error')}}
</div>
@endif

@if (session('info'))
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="fa fa-times-circle fa-lg" aria-hidden="true"></i>
  </button>
  <i class="fa fa-hand-paper-o fa-lg"></i>&nbsp;&nbsp;{{session('info')}}
</div>
@endif
