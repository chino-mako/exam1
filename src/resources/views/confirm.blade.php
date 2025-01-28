<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
</head>

<body>
    <div class="container">
        <header>
            <h1>FashionablyLate</h1>
            <h2>Confirm</h2>
        </header>

        <table class="confirm-table">
            <tr>
                <th>お名前</th>
                <td>
                    {{ $data['first_name'] }}
                    {{ $data['last_name'] }}
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>{{ $data['gender'] === 'male' ? '男性' : ($data['gender'] === 'female' ? '女性' : 'その他') }}</td>

            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $data['tel'] }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $data['address'] }}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $data['building'] }}</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $data['detail'] }}</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{{ $data['content'] }}</td>
            </tr>
        </table>

        <div class="actions">
            <form action="{{ route('thanks') }}" method="POST">
                @csrf
                <button type="submit" class="btn-submit">送信</button>
            </form>
            <form action="{{ route('contact') }}" method="GET">
                <button type="submit" class="btn-edit">修正</button>
            </form>
        </div>
    </div>

</body>

</html>