<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    // プロフィール編集画面を表示する
    public function edit()
    {
        $user = Auth::user();
        return view('mypage.profile', compact('user'));
    }

    // プロフィールを更新する
    public function update(Request $request)
{
    $user = Auth::user();

    // 画像が送られてきた場合の処理
    if ($request->hasFile('image')) {
        // storage/app/public/profiles フォルダに保存
        $path = $request->file('image')->store('profiles', 'public');
        // データベースにパスを保存
        $user->image = $path;
    }

    $user->name = $request->name;
    $user->post_code = $request->post_code;
    $user->address = $request->address;
    $user->building = $request->building;
    $user->save();

    return redirect('/');
}

    // マイページ（出品した商品一覧など）を表示する
    public function index()
    {
        return view('mypage.index');
    }
}