@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2 class="auth-title">プロフィール設定</h2>

    <form action="{{ route('mypage.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group" style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
    <div class="profile-image-preview" style="width: 100px; height: 100px; border-radius: 50%; background-color: #ddd; overflow: hidden; display: flex; align-items: center; justify-content: center;">
        @if($user->image)
            {{-- すでに保存された画像がある場合 --}}
            <img id="preview" src="{{ asset('storage/' . $user->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
        @else
            {{-- 画像がない時の初期表示（グレーの円の中に何も入れないか、プレビュー用のimgタグだけ用意） --}}
            <img id="preview" src="" style="width: 100%; height: 100%; object-fit: cover; display: none;">
        @endif
    </div>
    
    <label class="btn-outline-red" style="cursor: pointer; border: 1px solid #ea5b5b; color: #ea5b5b; padding: 8px 16px; border-radius: 4px;">
        画像を選択する
        {{-- onchange="previewImage(this);" を追加 --}}
        <input type="file" name="image" id="image-input" style="display: none;" accept="image/*" onchange="previewImage(this);">
    </label>
</div>

        {{-- ユーザー名 --}}
        <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>

        {{-- 郵便番号 --}}
        <div class="form-group">
            <label>郵便番号</label>
            <input type="text" name="post_code" class="form-control" value="{{ old('post_code') }}">
        </div>

        {{-- 住所 --}}
        <div class="form-group">
            <label>住所</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
        </div>

        {{-- 建物名 --}}
        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" class="form-control" value="{{ old('building') }}">
        </div>

        <button type="submit" class="btn-auth">更新する</button>
    </form>
</div>
<script>
function previewImage(obj)
{
    const fileReader = new FileReader();
    fileReader.onload = (function() {
        const preview = document.getElementById('preview');
        preview.src = fileReader.result;
        preview.style.display = 'block'; // 非表示にしていた場合は表示する
    });
    fileReader.readAsDataURL(obj.files[0]);
}
</script>
@endsection