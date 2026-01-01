@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
  <h1>商品一覧</h1>

  <nav style="margin: 12px 0;">
    <a href="{{ url('/') }}">お気に入り</a>
    @auth
      <a href="{{ route('items.mylist', ['tab' => 'mylist']) }}">マイリスト</a>
    @endauth
  </nav>

  @foreach($items as $item)
    <div style="margin-bottom: 20px;">
        <a href="{{ url('/item/' . $item->id) }}">
        <img src="{{ $item->img_url }}" style="width: 200px; height: 200px; object-fit: cover;">
            <p>{{ $item->name }}</p>
        </a>
    </div>
@endforeach
@endsection