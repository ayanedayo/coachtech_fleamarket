@extends('layouts.app')

@section('content')
<div class="auth"> {{-- app.cssの .auth に対応 --}}
    <h1 class="auth__title">会員登録</h1>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        {{-- ユーザー名 --}}
        <div class="auth__row">
            <label class="form__label">ユーザー名</label>
            <input class="form__input" type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <p class="form__error">{{ $message }}</p>
            @enderror
        </div>

        {{-- メールアドレス --}}
        <div class="auth__row">
            <label class="form__label">メールアドレス</label>
            <input class="form__input" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="form__error">{{ $message }}</p>
            @enderror
        </div>

        {{-- パスワード --}}
        <div class="auth__row">
            <label class="form__label">パスワード</label>
            <input class="form__input" type="password" name="password" required>
            @error('password')
                <p class="form__error">{{ $message }}</p>
            @enderror
        </div>

        {{-- 確認用パスワード --}}
        <div class="auth__row">
            <label class="form__label">確認用パスワード</label>
            <input class="form__input" type="password" name="password_confirmation" required>
        </div>

        <button class="form__submit" type="submit">登録する</button>

        <a class="form__link" href="{{ route('login') }}">ログインはこちら</a>
    </form>
</div>
@endsection