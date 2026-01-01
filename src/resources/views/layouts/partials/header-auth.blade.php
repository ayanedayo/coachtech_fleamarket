<header class="header">
    <div class="header__inner">

        {{-- ロゴ --}}
        <a href="{{ url('/') }}" class="header__logo">COACHTECH</a>

        {{-- 検索フォーム --}}
        <form action="{{ route('items.index') }}" method="GET" class="header__search">
            <input
                type="text"
                name="keyword"
                value="{{ request('keyword') }}"
                placeholder="なにをお探しですか？"
                class="header__search-input"
            >
        </form>

        {{-- ナビ --}}
        <nav class="header__nav">

            {{-- ログアウト --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="header__link">
                    ログアウト
                </button>
            </form>

            {{-- マイページ --}}
            <a href="{{ route('mypage.index') }}" class="header__link">
                マイページ
            </a>

            {{-- 出品 --}}
            <a href="{{ route('items.create') }}" class="header__btn">
                出品
            </a>

        </nav>

    </div>
</header>