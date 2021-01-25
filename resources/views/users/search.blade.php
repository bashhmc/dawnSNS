@extends('layouts.login')

@section('content')

<!--  入力フォーム  -->
<div class="search-form">
  {!! Form::open(['url' => '/search', 'method' => 'get', 'class' => 'search-input']) !!}
  {!! Form::input('text', 'searchInput', null,['required','placeholder' => 'ユーザー名', 'class'=>'search-input-form'] )!!}
    <button type="submit" class="btn-search"><img class="search-btn-image" src="images/search.png" alt="search-images"></button>
  {!! Form::close() !!}
</div>

<!-- 検索結果一覧を表示 -->
<div class="search-users">
  @foreach($searchAlls as $searchAll)
  <div class="search-user">
    <img src="images/{{ $searchAll -> images}}" alt="user-images" class="search-user-image">
    <p class="search-username">{{ $searchAll -> username}}</p>
    <!-- 「フォローする」「フォロー解除」それぞれのボタン作成 -->
  @if($auths->isFollowing($auths->id , $searchAll->id))
    {!! Form::open(['url' => '/search', 'method' => 'get', 'class' => 'search-unfollow']) !!}
      <button type="submit" class="un follow-btn" value="{{ $searchAll -> id}}" name="unfollow">フォローをはずす</button>
    {!! Form::close() !!}
  @else
    {!! Form::open(['url' => '/search','method' => 'get', 'class' => 'search-follow']) !!}
      <button type="submit" class="follow-btn" value="{{ $searchAll -> id}}" name="follow">フォローする
      </button>
    {!! Form::close() !!}
  @endif
  </div>
  @endforeach
</div>

@endsection
