<div class="blog-details-author">
  <div class="blog-details-author-thumb">
    <img src="{{asset($post->user->profile->avatar)}}" alt="{{$post->user->name}}">
  </div>
  <div class="blog-details-author-content">
    <div class="author-info">
      <h5 class="author-name">{{$post->user->name}}</h5>
      <p class="author-info">{{$post->user->profile->title}}</p>
    </div>
    <p class="text">{{$post->user->profile->about}}</p>
    <div class="socials">
      <a href="{{$post->user->profile->facebook}}" target="_blank" class="social__item">
        <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
      </a>
      <a href="#" target="_blank" class="social__item">
        <img src="{{asset('app/svg/twitter.svg')}}" alt="twitter">
      </a>
      <a href="#" target="_blank" class="social__item">
        <img src="{{asset('app/svg/google.svg')}}" alt="google">
      </a>
      <a href="{{$post->user->profile->youtube}}" target="_blank" class="social__item">
        <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
      </a>
    </div>
  </div>
</div>
