<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function show($item_id)
    {
        $user = Auth::user();
        $item = Item::findOrFail($item_id);

        return view('purchase.index', compact('user', 'item'));
    }

    public function store(Request $request, $item_id)
    {
        $user = Auth::user();
        $item = Item::findOrFail($item_id);

        if (!$request->payment_method) {
            return back()->with('error', '支払い方法を選択してください');
        }
        return redirect('/')->with('message', '購入が完了しました！');
    }
}