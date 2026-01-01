@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <h1>マイページ</h1>
    <div style="display: flex; align-items: center; gap: 20px;">
        @if(Auth::user()->image)
            <img src="{{ asset('storage/' . Auth::user()->image) }}" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
        @else
            <div style="width: 100px; height: 100px; background: #ccc; border-radius: 50%;"></div>
        @endif
        
        <h2>{{ Auth::user()->name }} さん</h2>
    </div>
    
    <p>郵便番号：{{ Auth::user()->post_code }}</p>
    <p>住所：{{ Auth::user()->address }} {{ Auth::user()->building }}</p>
    
    <a href="{{ url('/mypage/profile') }}" style="display: inline-block; margin-top: 20px; padding: 10px; background: #ff4d4d; color: #fff; text-decoration: none; border-radius: 5px;">
        プロフィールを編集する
    </a>
</div>
@endsection