@extends('layouts.login')

@section('content')
<!-- FollowList Images -->
<div class="follow-list-images">
  <p>Follow list</p>
  <div class="follow-images">
  @foreach ($follow_id_lists as $follow_id_list)
    <div class="follow-image">
      <a href="/profile/{{ $follow_id_list -> id}}">
        <img src="images/{{ $follow_id_list -> images}}" alt="follow image">
      </a>
    </div>
  @endforeach
  </div>
</div>

<!-- FollowList TimeLines -->
<div id="followTimeLines">
  @foreach ($timeLines as $timeLine)
  <div id="followListPost" class="user-post">
    <a href="/profile/{{ $timeLine -> user -> id}}">
      <img class="user-post-image" src="images/{{ $timeLine -> user -> images}}" alt="user-image">
    </a>
    <p class="post-username">{{ $timeLine -> user -> username}}</p>
    <p class="post-created-at">{{ $timeLine -> created_at }}</p>
    <p class="post-contents">{{ $timeLine -> posts }}</p>
  </div>
  @endforeach
</div>

@endsection
