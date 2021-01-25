@extends('layouts.login')

@section('content')
<!-- profile -->
<div class="profile">
  @foreach ($user_profiles as $user_profile)
  <img class="profile-user-image" src="images/{{ $user_profile -> images }}" alt="user profile image">
  <div class=profile-name>
    <p>Name</p>
    <p>{{ $user_profile -> username}}</p>
  </div>
  <div class="profile-bio">
    <p>Bio</p>
    <p>{{ $user_profile -> bio}}</p>
  </div>
  @if($auths->isFollowing($auths->id , $user_profile->id))
    {!! Form::open(['url' => '/search', 'method' => 'get', 'class' => 'search-unfollow']) !!}
      <button type="submit" class="un follow-btn" value="{{ $user_profile -> id}}" name="unfollow">フォローをはずす</button>
    {!! Form::close() !!}
  @else
    {!! Form::open(['url' => '/search','method' => 'get', 'class' => 'search-follow']) !!}
      <button type="submit" class="follow-btn" value="{{ $user_profile -> id}}" name="follow">フォローする
      </button>
    {!! Form::close() !!}
  @endif
  @endforeach
</div>

<!-- timeline -->
<div id="profileTimeLines">
  @foreach ($user_profiles as $user_profile)
  <div id="profilePost" class="user-post">
    <img class="user-post-image" src="images/{{ $user_profile -> images}}" alt="user-image">
    <p class="post-username">{{ $user_profile -> username}}</p>
    <p class="post-created-at">{{ $user_profile -> created_at }}</p>
    <p class="post-contents">{{ $user_profile -> posts }}</p>
  </div>
  @endforeach
</div>

@endsection
