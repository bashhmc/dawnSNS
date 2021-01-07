@extends('layouts.logout')

@section('content')

<!-- フォームファサードでurlを指定 -->
<!-- URLはまだコントローラもルーティングも未指定 -->
{!! Form::open(['url' => '/login']) !!}

<p>DAWNSNSへようこそ</p>

{{ Form::label('MailAddress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('Password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('LOGIN') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
