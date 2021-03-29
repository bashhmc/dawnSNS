@extends('layouts.login')

@section('content')
<!-- MyProfile -->
@foreach ($user_profiles as $user_profile)
@if($auths->id === $user_profile ->id)
<div class="my-profile-contents">
  <img class="my-profile-image" src="{{ asset('images/'. $auths -> images) }}" alt="user_image">
  {!! Form::open(['url' => '/profile' , 'method' => 'post' ,'enctype'=>'multipart/form-data' , 'class' => 'my-profile-form']) !!}
  <div class="username">
    <p class="profile-item">UserName</p>
    {!! Form::text('username', $user_profile -> username, ['required','class' => 'my-profile-username']) !!}
    @if($errors->has('username'))
      <p class=error>{{ $errors->first('username')}}</p>
    @endif
  </div>
  <div class="mail-address profile-items">
    <p class="profile-item">MailAdress</p>
    {!! Form::text('mail', $user_profile -> mail, ['required','class' => 'my-profile-mail-address']) !!}
    @if($errors->has('mail'))
      <p class=error>{{ $errors->first('mail')}}</p>
    @endif
  </div>
  <div class="old-password profile-items">
    <p class="profile-item">Password</p>
    {!! Form::input('password','old-password', $user_profile -> nothashpassword, ['disabled','class' => 'my-profile-old-password']) !!}
  </div>
  <div class="new-password profile-items">
    <p class="profile-item">new Passwprd</p>
    {!! Form::input('password','new-password', null, ['null','class' => 'my-profile-password']) !!}
    @if($errors->has('new-password'))
      <p class=error>{{ $errors->first('new-password')}}</p>
    @endif
  </div>
  <div class="bio profile-items">
    <p class="profile-item">Bio</p>
    {!! Form::text('bio', $user_profile -> bio, ['null','class' => 'my-profile-bio','size'=>50,'maxlength'=>10]) !!}
    @if($errors->has('bio'))
      <p class=error>{{ $errors->first('bio')}}</p>
    @endif
  </div>
  <div class="image-upload profile-items">
    <p class="profile-item">Icon Image</p>
    <div class="image-form">
      <label class="image-form-label">
        {!! Form::file('image-file', null, ['class' => 'my-profile-images']) !!}
        @if($errors->has('image-file'))
          <p class=error>{{ $errors->first('image-file')}}</p>
        @endif
      </label>
    </div>
  </div>
  {!! Form::submit('更新',['class'=>'my-profile-button']) !!}
</div>
@else

<!-- profile -->
<div class="profile">
  <img class="profile-user-image" src="{{ asset('images/'. $user_profile -> images) }}" alt="user profile image">
  <div class=profile-name>
    <p>Name</p>
    <p class="profile-username">{{ $user_profile -> username}}</p>
  </div>
  <div class="profile-bio">
    <p>Bio</p>
    <p class="profile-user-bio">{{ $user_profile -> bio}}</p>
  </div>
  @if($auths->isFollowing($auths->id , $user_profile->id))
    {!! Form::open(['url' => '/search', 'method' => 'get', 'class' => 'search-unfollow p-follow']) !!}
      <button type="submit" class="un follow-btn" value="{{ $user_profile -> id}}" name="unfollow">フォローをはずす</button>
    {!! Form::close() !!}
  @else
    {!! Form::open(['url' => '/search','method' => 'get', 'class' => 'search-follow p-follow']) !!}
      <button type="submit" class="follow-btn" value="{{ $user_profile -> id}}" name="follow">フォローする
      </button>
    {!! Form::close() !!}
  @endif
</div>

<!-- timeline -->
<div id="profileTimeLines">
  <div id="profilePost" class="user-post">
    <img class="user-post-image" src="{{ asset('images/'. $user_profile -> images) }}" alt="user-image">
    <p class="post-username">{{ $user_profile -> username}}</p>
    <p class="post-created-at">{{ $user_profile -> created_at }}</p>
    <p class="post-contents">{{ $user_profile -> post -> posts }}</p>
  </div>
</div>
@endif
@endforeach

@endsection
