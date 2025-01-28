<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>FashionablyLate</h1>
            <h2>Register</h2>
        </div>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}" />
                <div class="form__error">
                    @error('name')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                <div class="form__error">
                    @error('email')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="例: coachtech1106" value="{{ old('password') }}" />
                <div class="form__error">
                    @error('password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-submit">登録</button>
        </form>
        <div class="login-link">
            <a href="{{ route('login') }}">ログインはこちら</a>
        </div>
    </div>
</body>

</html>