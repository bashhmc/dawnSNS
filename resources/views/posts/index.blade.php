@extends('layouts.login')

@section('content')

<!-- 投稿フォーム -->
<div id="PostForm" class="post-form">
<img class="postform-image" src="images/{{ $auths -> images }}" alt="user-image">
  {!! Form::open(['url' => '/top' ,'method' => 'get', 'class' => 'form-class']) !!}
  <div id="FormGroup">
    {!! Form::input('text', 'newPost', null, ['required','class' => 'form-control', 'placeholder' => '何をつぶやこうか…？' ] )!!}
  </div>
  <button type="submit" class="btn-form"><img src="images/post.png" alt="post-image"></button>
  {!! Form::close() !!}
</div>

<!-- タイムライン -->
<div id="timeline">
  <!-- タイムライン形式で表示 -->
  @foreach ($timeLines as $timeLine)
  <div id="serPost" class="user-post">
    <a href="/profile/{{ $timeLine -> user_id}}">
      <img class="user-post-image" src="images/{{ $timeLine -> user -> images}}" alt="user-image">
    </a>
    <p class="post-username">{{ $timeLine -> user -> username}}</p>
    <p class="post-created-at">{{ $timeLine -> created_at }}</p>
    <p class="post-contents">{{ $timeLine -> posts }}</p>
      @if($auths->post->userPost($auths->id,$timeLine->user_id))
        <!-- Trash -->
        {!! Form::open(['url' => '/top','method' => 'get']) !!}
        <button class="post-trash" name="trashId" value="{{ $timeLine -> id }}" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
          <img class="trash" src="images/trash.png" alt="post-trash-image">
        </button>
        {!! Form::close()!!}
        <!-- Edit -->
        <a class="post-edit" href="" data-target="post-modal-{{ $timeLine -> id }}">
          <img src="images/edit.png" alt="post-edit-image">
        </a>
        <!-- EditModal -->
        <div class="edit-modal" id="post-modal-{{ $timeLine -> id }}">
          <div class="inner">
            <div class="inner-contents">
              {!! Form::open(['url' => '/top','method' => 'get']) !!}
                {!! Form::hidden('id', $timeLine -> id) !!}
                {!! Form::text('editPost', $timeLine -> posts, ['required', 'class'=>'user-post-edit-contents'])!!}
                <p class="contents-validator">編集画面が表示されると、選択された投稿内容が初期から入っているように<br>最大200文字までとする</p>
                <button class="inner-post-edit-image">
                  <img src="images/edit.png" alt="post-edit-image">
                </button>
              {!! Form::close()!!}
            </div>
          </div>
        </div>
      @endif
  </div>
  @endforeach
</div>


@endsection
