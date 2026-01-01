<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'COACHTECH')</title>
</head>
<body>

  {{-- 黒枠ヘッダー（全ページ共通で出す） --}}
  <header style="background:#000; color:#fff; padding:12px 16px;">
    <div style="display:flex; align-items:center; justify-content:space-between; gap:16px;">
      <div style="font-weight:bold;">COACHTECH</div>

      {{-- ログイン後だけフルヘッダー --}}
      @auth
        <div style="display:flex; align-items:center; gap:12px;">

          {{-- 検索 --}}
          <form method="GET" action="{{ url('/') }}">
            <input
              type="text"
              name="keyword"
              value="{{ request('keyword') }}"
              placeholder="なにをお探しですか？"
              style="padding:6px 10px; width:260px;"
            >
            {{-- タブを維持したいなら --}}
            <input type="hidden" name="tab" value="{{ request('tab') }}">
          </form>

          <a href="{{ route('mypage.index') }}" style="color:#fff;">マイページ</a>
          <a href="{{ route('items.create') }}" style="color:#fff;">出品</a>

          {{-- ログアウト --}}
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">ログアウト</button>
          </form>
        </div>
      @endauth
    </div>
  </header>

  <main style="padding:24px;">
    @yield('content')
  </main>

</body>
</html>