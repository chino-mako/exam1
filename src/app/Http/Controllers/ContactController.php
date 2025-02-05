<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    //入力画面
    public function contact()
    {
        return view('contact');
    }

    //確認画面
    public function confirm(ContactRequest $request)
    {
        // 電話番号を結合
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        // バリデーション済みのデータを取得
        $validated = $request->validated();

        // データに電話番号を追加
        $validated['tel'] = $tel;

        // デフォルト値を補完
        if (!isset($validated['building'])) {
            $validated['building'] = '（入力なし）';
        }

        // 確認画面に遷移
        return view('confirm', ['data' => $validated]);
    }

    public function edit()
    {
        // 修正時の処理 (例: 元のフォーム画面に戻す)
        return redirect()->route('contact'); // フォーム画面に戻る
    }

    //サンクス画面
    public function store(Request $request)
    {
        // 電話番号を結合して保存用データを作成
        $data = $request->all();
        $data['tel'] = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required',
            'email' => 'required|email',
            'tel' => 'nullable|string',
            'address' => 'nullable|string',
            'building' => 'nullable|string',
            'content' => 'required|string',
            'detail' => 'required|string',
        ]);

        // データベースに保存
        Contact::create($validated);

        return redirect()->route('contact.thanks');
    }
}
