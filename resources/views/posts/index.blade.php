@extends('layouts.login')

@section('content')

<!-- 投稿フォーム -->
<div id="PostForm" class="post-form">
<img class="postform-image" src="images/{{ $auths -> images }}" alt="user-image">
  {!! Form::open(['url' => '/top' , 'method' => 'get' ,'class' => 'form-class']) !!}
  <div id="FormGroup">
    {!! Form::input('text', 'newPost', null, [ 'required','class' => 'form-control', 'placeholder' => '何をつぶやこうか…？' ] )!!}
  </div>
  <button type="submit" class="btn-form"><img src="images/post.png" alt="post-image"></button>
  {!! Form::close() !!}
</div>

<!-- タイムライン -->
<div id="timeline">
  <!-- タイムライン形式で表示 -->
  @foreach ($timeLines as $timeLine)
  <div id="serPost" class="user-post">
    <img class="user-post-image" src="images/{{ $timeLine -> user -> images }}" alt="user-image">
    <p class="post-username">{{ $timeLine -> user -> username }}</p>
    <!-- ↑コントローラーメソッドと、モデルのプロパティは同時使用可能 -->
    <p class="post-created-at">{{ $timeLine -> created_at }}</p>
    <p class="post-contents">{{ $timeLine -> posts }}</p>
    <a class="post-edit" href=""><img src="images/trash.png" alt="post-trash-image"></a>
    <a class="post-edit" href=""><img src="images/edit.png" alt="post-edit-image"></a>
  </div>
  @endforeach
</div>


@endsection
