@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 40px auto; display: flex; gap: 40px; padding: 0 20px;">
    <div style="flex: 2;">
        <div style="display: flex; gap: 20px; padding-bottom: 20px; border-bottom: 1px solid #eee;">
            <img src="{{ $item->img_url }}" style="width: 150px; height: 150px; object-fit: cover;">
            <div>
                <h2 style="font-size: 24px; margin: 0;">{{ $item->title }}</h2>
                <p style="font-size: 20px;">¥{{ number_format($item->price) }}</p>
            </div>
        </div>

        <div style="margin-top: 30px;">
            <h3 style="font-size: 18px; margin-bottom: 10px;">支払い方法</h3>
            <select name="payment_method" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">選択してください</option>
                <option value="konbini">コンビニ払い</option>
                <option value="card">カード払い</option>
            </select>
        </div>

        <div style="margin-top: 30px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 style="font-size: 18px;">配送先</h3>
                <a href="{{ route('purchase.address', ['item_id' => $item->id]) }}" style="color: #007bff; text-decoration: none;">変更する</a>
            </div>
            <p style="margin: 5px 0;">〒 {{ $user->post_code }}</p>
            <p style="margin: 0;">{{ $user->address }} {{ $user->building }}</p>
        </div>
    </div>

    <div style="flex: 1; border: 1px solid #eee; padding: 20px; height: fit-content; border-radius: 8px;">
    <form action="{{ route('purchase.store', ['item_id' => $item->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="payment_method" value="コンビニ払い"> 

    </form>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <td style="padding: 10px 0;">商品代金</td>
                <td style="text-align: right;">¥{{ number_format($item->price) }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">支払い方法</td>
                <td style="text-align: right; color: #666;">選択してください</td>
            </tr>
        </table>
        
        <form action="{{ route('purchase.store', ['item_id' => $item->id]) }}" method="POST">
            @csrf
            <button type="submit" style="width: 100%; padding: 15px; background: #ff4d4d; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                購入する
            </button>
        </form>
    </div>
</div>
@endsection