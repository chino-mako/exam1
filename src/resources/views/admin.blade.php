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
        <form class="search-form" method="GET" action="{{ route('admin.index') }}">
            <input type="text" name="name" placeholder="名前を入力">
            <input type="email" name="email" placeholder="メールアドレスを入力">
            <select name="gender">
                <option value="">性別</option>
                <option value="male">男性</option>
                <option value="female">女性</option>
                <option value="other">その他</option>
            </select>
            <select name="content">
                <option value="">お問い合わせの種類</option>
                <option value="">商品のお届けについて</option>
                <option value="">商品の交換について</option>
                <option value="">商品トラブル/option>
                <option value="">ショップへのお問合せ</option>
                <option value="">商品のその他</option>
            </select>
            <input type="date" name="date">
            <button type="submit">検索</button>
            <button type="reset">リセット</button>
        </form>

        <!-- テーブル -->
        <a href="{{ route('admin.export') }}" class="btn-export">エクスポート</a>

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
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                    <td>{{ $contact->gender === 'male' ? '男性' : ($contact->gender === 'female' ? '女性' : 'その他') }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->content }}</td>
                    <td>{{ $contact->detail }}</td>
                    <td>
                        <button class="btn-detail" data-id="{{ $contact->id }}">詳細</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- ページネーション -->
        <div class="pagination">
            {{ $contacts->links() }}
        </div>
    </div>

    <!-- モーダルウィンドウ -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>お問い合わせ詳細</h2>
            <table>
                <tr>
                    <th>お名前</th>
                    <td id="modal-name"></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td id="modal-gender"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td id="modal-email"></td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td id="modal-type"></td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td id="modal-detail"></td>
                </tr>
            </table>
            <button id="delete-btn">削除</button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("modal");
            const closeBtn = document.querySelector(".close");
            const detailButtons = document.querySelectorAll(".btn-detail");

            detailButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const row = this.closest("tr");
                    document.getElementById("modal-name").innerText = row.children[0].innerText;
                    document.getElementById("modal-gender").innerText = row.children[1].innerText;
                    document.getElementById("modal-email").innerText = row.children[2].innerText;
                    document.getElementById("modal-type").innerText = row.children[3].innerText;
                    document.getElementById("modal-detail").innerText = this.dataset.detail;

                    modal.style.display = "block";
                });
            });

            closeBtn.addEventListener("click", function() {
                modal.style.display = "none";
            });

            window.addEventListener("click", function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>

</body>

</html>