@extends('layouts.logout')

@section('content')

<!-- フォームファサードでurlを指定 -->
<!-- URLはまだコントローラもルーティングも未指定 -->

<p class="login-subtitle">Social Network Service</p>
<div class="container" id="container">
{!! Form::open(['url' => '/login']) !!}

<p>DAWNSNSへようこそ</p>

{{ Form::label('MailAddress', null,['class'=>'label-mail']) }}
{{ Form::text('mail',null,['class' => 'login-input']) }}
{{ Form::label('Password', null,['class'=>'label-password']) }}
{{ Form::password('password',['class' => 'login-input']) }}

{{ Form::submit('LOGIN',['class' => 'login-form-btn']) }}

<p><a class="login-new-account" href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
</div>

@endsection
