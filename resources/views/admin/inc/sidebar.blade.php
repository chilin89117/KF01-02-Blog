<ul class="list-group">
  <li class="list-group-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
  <li class="list-group-item"><a href="{{route('profile.editProfile', auth()->user())}}">My Profile</a></li>
  <li class="list-group-item"><a href="{{route('posts.create')}}">Create Post</a></li>
  @if(auth()->user()->admin)
  <li class="list-group-item"><a href="{{route('posts.index')}}">Published Posts</a></li>
  <li class="list-group-item"><a href="{{route('posts.trashed')}}">Trashed Posts</a></li>
  <li class="list-group-item"><a href="{{route('categories.index')}}">Categories</a></li>
  <li class="list-group-item"><a href="{{route('tags.index')}}">Tags</a></li>
  <li class="list-group-item"><a href="{{route('users.index')}}">Registered Users</a></li>
  <li class="list-group-item"><a href="{{route('users.create')}}">Create User</a></li>
  <li class="list-group-item"><a href="{{route('settings.edit')}}">Edit Settings</a></li>
  @endif
</ul>
