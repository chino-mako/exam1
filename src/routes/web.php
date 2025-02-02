<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

use App\Models\User;
use App\Http\Controllers\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 登録ページの表示
Route::get('/register', [RegisterController::class, 'index'])->name('register');

//登録処理
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// ログインページの表示
Route::get('/login', [LoginController::class, 'show'])->name('login');

// ログインページに遷移
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

// 管理画面の表示
Route::get('/admin', function () {
    $users = User::all(); // ユーザーデータを取得

    // admin.blade.php を返す
    return view('admin', compact('users'));

    // ログイン状態でのみアクセス可能
})->name('admin')->middleware('auth');

// ログアウト処理
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

//お問合せ内容入力画面
Route::get('/contact', [ContactController::class, 'contact'])->name('contact.contact');

//お問い合わせ内容確認画面
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

//サンクスページ
Route::post('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
