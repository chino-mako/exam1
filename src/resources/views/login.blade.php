<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>FashionablyLate</h1>
            <h2>Login</h2>
        </div>
        <form action="{{ route('login.perform') }}" method="POST">
            @csrf
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
                <input type="password" id="password" name="password" placeholder="例: coachtech1106" />
                <div class="form__error">
                    @error('password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn-submit">ログイン</button>
        </form>
        <div class="register-link">
            <a href="{{ route('register') }}">register</a>
        </div>
    </div>

</body>

</html>