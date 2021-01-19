@extends('layouts.login')

@section('content')

<!--  入力フォーム  -->
<div class="search-form">
  {!! Form::open(['url' => '/search', 'method' => 'get', 'class' => 'serch-input']) !!}
  {!! Form::input('text', 'searchInput', null,['required','placeholder' => ''] )!!}
    <button type="submit" class="btn-search"><img src="images/search.png" alt="search-images"></button>
  {!! Form::close() !!}
</div>

<!-- 検索結果一覧を表示 -->
<div class="search-users">
  @foreach($searchAlls as $searchAll)
  <img src="images/{{ $searchAll -> images}}" alt="user-images" class="">
  <p class="search-username">{{ $searchAll -> username}}</p>
  <!-- 「フォローする」「フォロー解除」それぞれのボタン作成 -->
  @if($auths->isFollowing($auths->id , $searchAll->id))
    <form action="{{ route('search',['id' => $searchAll->id]) }}" method="POST">
      <button type="submit" class="search-btn">フォロー解除</button>
    </form>
  @else
    <form action="{{ route('search',['id' => $searchAll->id]) }}" method="POST">
      <button type="submit" class="search-btn">フォローする</button>
    </form>
  @endif
  @endforeach
</div>

@endsection
