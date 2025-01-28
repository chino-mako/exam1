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
        //フォームデータを取得
        $data = $request->all();

        //確認画面に遷移
        return view('confirm', compact('data'));
    }

    public function edit()
    {
        // 修正時の処理 (例: 元のフォーム画面に戻す)
        return redirect()->route('contact'); // フォーム画面に戻る
    }

    //サンクス画面
    public function thanks(Request $request)
    {
        //データベースに保存
        Contact::create($request->all());

        //完了画面を表示
        return redirect('thanks');
    }
}
