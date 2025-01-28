<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <div class="container">
        <header>
            <h1>FashionablyLate</h1>
            <h2>Admin</h2>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </header>

        <!-- 検索フォーム -->
        <form class="search-form">
            <input type="text" placeholder="名前やメールアドレスを入力してください">
            <select>
                <option value="">性別</option>
                <option value="male">男性</option>
                <option value="female">女性</option>
            </select>
            <select>
                <option value="">お問い合わせの種類</option>
                <option value="exchange">商品の交換について</option>
                <option value="refund">返金について</option>
            </select>
            <input type="date">
            <button type="submit" class="btn-search">検索</button>
            <button type="reset" class="btn-reset">リセット</button>
        </form>

        <!-- テーブル -->
        <button class="btn-export">エクスポート</button>
        <table>
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 8; $i++)
                    <tr>
                    <td>山田 太郎</td>
                    <td>男性</td>
                    <td>test@example.com</td>
                    <td>商品の交換について</td>
                    <td><button class="btn-detail">詳細</button></td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <!-- ページネーション -->
        <div class="pagination">
            <button>1</button>
            <button>2</button>
            <button>3</button>
            <button>4</button>
            <button>5</button>
        </div>
    </div>

</body>

</html>