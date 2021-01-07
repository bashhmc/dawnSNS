@extends('layouts.logout')

@section('content')
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if($errors->has('username'))<p class=error>{{ $errors->first('username')}}</p> @endif

<br>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if($errors->has('mail'))<p class=error>{{ $errors->first('mail')}}</p> @endif

<br>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
@if($errors->has('password'))<p class=error>{{ $errors->first('password')}}</p> @endif

<br>
{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
@if($errors->has('password_confirmation'))<p class=error>{{ $errors->first('password_confirmation')}}</p> @endif

<br>
{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
