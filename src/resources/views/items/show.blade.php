@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 40px auto; display: flex; gap: 50px; padding: 0 20px;">
    <div style="flex: 1; background: #f5f5f5; display: flex; align-items: center; justify-content: center; height: 500px;">
        <img src="{{ $item->img_url }}" alt="{{ $item->title }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
    </div>

    <div style="flex: 1;">
        <h1 style="font-size: 28px; margin-bottom: 5px;">{{ $item->title }}</h1>
        <p style="color: #666; margin-bottom: 20px;">{{ $item->brand }}</p>
        <p style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">¥{{ number_format($item->price) }} (税込)</p>
        
        <a href="{{ url('/purchase/' . $item->id) }}" style="display: block; width: 100%; padding: 15px; background: #ff4d4d; color: white; text-align: center; text-decoration: none; border-radius: 5px; font-weight: bold; margin-bottom: 30px;">
            購入手続きへ
        </a>

        <h3 style="border-bottom: 1px solid #ccc; padding-bottom: 10px; margin-bottom: 15px;">商品説明</h3>
        <p style="line-height: 1.6; margin-bottom: 30px;">{{ $item->description }}</p>

        <h3 style="border-bottom: 1px solid #ccc; padding-bottom: 10px; margin-bottom: 15px;">商品の情報</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px 0; font-weight: bold; width: 30%;">カテゴリー</td>
                <td style="padding: 10px 0;">{{ $item->category->name ?? '未設定' }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; font-weight: bold;">商品の状態</td>
                <td style="padding: 10px 0;">{{ $item->condition->name ?? '未設定' }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection