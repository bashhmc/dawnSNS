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
  <button class="search-btn">フォローする</button>
</div>

@endsection
