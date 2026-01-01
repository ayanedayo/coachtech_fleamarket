@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
  <h1 class="auth__title">ログイン</h1>

  <form method="POST" action="{{ route('login.store') }}">
    @csrf

    <div class="form__row">
      <label class="form__label">メールアドレス</label>
      <input class="form__input" type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="form__row">
      <label class="form__label">パスワード</label>
      <input class="form__input" type="password" name="password" required>
    </div>

    <button class="form__submit" type="submit">ログインする</button>

    <a class="form__link" href="{{ route('register') }}">会員登録はこちら</a>
  </form>
@endsection