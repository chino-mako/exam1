<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    //登録画面の表示
    public function index()
    {
        return view('register');
    }

    //入力データの保存とログイン画面へ遷移
    public function store(RegisterRequest $request)
    {
        $register = $request->only(['name', 'email', 'password']);
        // パスワードをハッシュ化
        $register['password'] = Hash::make($register['password']);
        User::create($register);

        return redirect()->route('login');
    }
}
