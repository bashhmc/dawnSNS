@extends('layouts.logout')

@section('content')

<div class="add-container" id="clear">
<p>{{$postdata['username']}}さん、</p>
<p class="add-welcome">ようこそ！DAWNSNSへ！</p>
<p class="add-done">ユーザー登録が完了しました。</p>
<p class="add-lets">さっそく、ログインをしてみましょう。</p>

<p class="btn"><a class="add-btn" href="/login">ログイン画面へ</a></p>
</div>

@endsection
