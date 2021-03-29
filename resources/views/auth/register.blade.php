@extends('layouts.logout')

@section('content')
<div class="register-container" id="container">
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名', null,['class'=>'label-register register-username']) }}
{{ Form::text('username',null,['class' => 'register-input']) }}
@if($errors->has('username'))<p class=error>{{ $errors->first('username')}}</p> @endif

<br>
{{ Form::label('メールアドレス', null,['class'=>'label-register register-mail']) }}
{{ Form::text('mail',null,['class' => 'register-input']) }}
@if($errors->has('mail'))<p class=error>{{ $errors->first('mail')}}</p> @endif

<br>
{{ Form::label('パスワード', null,['class'=>'label-register register-password']) }}
{{ Form::text('password',null,['class' => 'register-input']) }}
@if($errors->has('password'))<p class=error>{{ $errors->first('password')}}</p> @endif

<br>
{{ Form::label('パスワード確認', null,['class'=>'label-register register-con-password']) }}
{{ Form::text('password_confirmation',null,['class' => 'register-input']) }}
@if($errors->has('password_confirmation'))<p class=error>{{ $errors->first('password_confirmation')}}</p> @endif

<br>
{{ Form::submit('登録',['class' => 'register-form-btn']) }}

<p><a class="back-login-form" href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</div>

@endsection
