<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function show($item_id)
{
    $item = Item::with(['category', 'condition'])->findOrFail($item_id);

    return view('items.show', compact('item'));
}

    public function create()
    {
    $categories = [
        'ファッション', '家電', 'インテリア', 'レディース', 'メンズ', 'コスメ',
        '本', 'ゲーム', 'スポーツ', 'キッチン', 'ハンドメイド', 'アクセサリー',
        'おもちゃ', 'ベビー・キッズ'
    ];

    $conditions = [
        '1' => '良好',
        '2' => '目立った傷や汚れなし',
        '3' => 'やや傷や汚れあり',
        '4' => '状態が悪い',
    ];

    return view('items.create', compact('categories', 'conditions'));
}
}