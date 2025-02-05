<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth; // Authファサードをインポート


class LoginController extends Controller
{
    //ログイン画面の表示
    public function show()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        // 入力された値を確認 (デバッグ用)
        logger()->info('Login attempt:', $credentials);

        if (Auth::attempt($credentials)) {
            // 管理画面へリダイレクト
            return redirect()->route('admin.index');
        }

        logger()->error('Login failed for:', $credentials);

        return back()->withInput()->withErrors(['email' => 'ログイン情報が正しくありません']);
    }
}
