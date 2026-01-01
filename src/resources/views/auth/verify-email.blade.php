@extends('layouts.auth')

@section('title', 'メール認証')

@section('content')
<div class="auth">
    <h1 class="auth__title">メール認証</h1>

    <p class="auth__text">
        登録したメールアドレスに認証リンクを送信しました。メールを確認してください。
    </p>

    @if (session('status') === 'verification-link-sent')
        <p class="auth__status">認証メールを再送しました。</p>
    @endif

    <div class="auth__actions">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="form__submit" type="submit">認証メールを再送する</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="auth__linkButton" type="submit">ログアウト</button>
        </form>
    </div>
</div>
@endsection