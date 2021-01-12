@extends('layouts.login')

@section('content')

<!--  入力フォーム  -->
<div class="search-form">
  {!! Form::open(['url' => '/serch', 'method' => 'get', 'class' => 'serch-input']) !!}
  {!! Form::input('text', 'serchInput', null['required','placeholder' => ''] )!!}
    <button type="submit" class="btn-search"><img src="images/search.png" alt="search-images"></button>
  {!! Form::close() !!}
</div>
<!-- 検索結果一覧を表示 -->
<div class="search-users">
  <img src="images/dawn.png" alt="user-images" class="">
  <p class="search-username">UserName</p>
  <button class="search-btn">フォローする</button>
</div>

@endsection
