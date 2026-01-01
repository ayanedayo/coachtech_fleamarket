@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="page-title">商品の出品</h2>

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

    <div class="form-group">
    <label class="form-label">商品画像</label>
    <div class="image-upload-box" id="upload-box">
        {{-- プレビュー画像を表示する場所を追加 --}}
        <img id="preview" src="" alt="" style="display: none; max-width: 100%; max-height: 200px; margin-bottom: 10px;">
        
        <input type="file" name="item_image" id="item_image" style="display:none;" accept="image/*">
        <label for="item_image" class="image-label">画像を選択する</label>
    </div>
</div>

        <h3 class="sub-title">商品の詳細</h3>

        {{-- カテゴリー --}}
        <div class="form-group">
            <label class="form-label">カテゴリー</label>
            <div class="category-grid">
                @foreach($categories as $category)
                    <input type="checkbox" name="categories[]" value="{{ $category }}" id="cat-{{ $category }}" class="category-input">
                    <label for="cat-{{ $category }}" class="category-label">{{ $category }}</label>
                @endforeach
            </div>
        </div>

        {{-- 商品の状態 --}}
        <div class="form-group">
            <label class="form-label">商品の状態</label>
            <select name="condition" class="form-control">
                <option value="" selected disabled>選択してください</option>
                @foreach($conditions as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <h3 class="sub-title">商品名と説明</h3>

        {{-- 商品名 --}}
        <div class="form-group">
            <label class="form-label">商品名</label>
            <input type="text" name="name" class="form-control">
        </div>

        {{-- ブランド名（追加） --}}
        <div class="form-group">
            <label class="form-label">ブランド名</label>
            <input type="text" name="brand" class="form-control">
        </div>

        {{-- 商品の説明（復活！） --}}
        <div class="form-group">
            <label class="form-label">商品の説明</label>
            <textarea name="description" rows="5" class="form-control"></textarea>
        </div>

        {{-- 販売価格 --}}
        <div class="form-group">
            <label class="form-label">販売価格</label>
            <div class="price-input">
                <span class="currency">¥</span>
                <input type="number" name="price" class="form-control" placeholder="0">
            </div>
        </div>

        <button type="submit" class="btn-submit">出品する</button>
    </form>
</div>
<script>
document.getElementById('item_image').addEventListener('change', function (e) {
    const reader = new FileReader();
    const preview = document.getElementById('preview');
    const label = document.querySelector('.image-label');

    reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block'; // 画像を表示
        label.innerText = '画像を修正する'; // ボタンの文字を変える
    }
    reader.readAsDataURL(e.target.files[0]);
});
</script>
@endsection