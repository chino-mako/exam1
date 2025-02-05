<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <!-- CSSファイルをリンク -->
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>

<body>
    <div class="container">
        <header>
            <h1>FashionablyLate</h1>
            <h2>Contact</h2>
        </header>

        @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('contact.confirm') }}" method="POST" class="contact-form">
            @csrf
            <div class="form-group">
                <label for="last_name">お名前 <span class="required">※</span></label>
                <div class="name-fields">
                    <input type="text" id="last_name" name="last_name" placeholder="例: 山田" value="{{old('last_name')}}" />
                    <div class="form__error">
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    </div>
                    <input type="text" id="first_name" name="first_name" placeholder="例: 太郎" value="{{old('first_name')}}" />
                    <div class="form__error">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="gender">性別 <span class="required">※</span></label>
                <div class="gender-options">
                    <label><input type="radio" name="gender" value="male" required> 男性</label>
                    <label><input type="radio" name="gender" value="female"> 女性</label>
                    <label><input type="radio" name="gender" value="other"> その他</label>
                    <div class="form__error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">メールアドレス <span class="required">※</span></label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{old('email')}}" />
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="tel">電話番号 <span class="required">※</span></label>
                <div class="tel-fields">
                    <input type="text" name="tel1" placeholder="080" maxlength="3" value="{{ old('tel1') }}" />
                    <span>-</span>
                    <div class="form__error">
                        @error('tel1')
                        {{ $message }}
                        @enderror
                    </div>

                    <input type="text" name="tel2" placeholder="1234" maxlength="4" value="{{ old('tel2') }}" />
                    <span>-</span>
                    <div class="form__error">
                        @error('tel2')
                        {{ $message }}
                        @enderror
                    </div>

                    <input type="text" name="tel3" placeholder="5678" maxlength="4" value="{{ old('tel3') }}" />
                    <div class="form__error">
                        @error('tel3')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="address">住所 <span class="required">※</span></label>
                <input type="text" id="address" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}" />
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="building">建物名</label>
                <input type="text" id="building" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>

            <div class="form-group">
                <label for="inquiry_type">お問い合わせの種類 <span class="required">※</span></label>
                <select id="inquiry_type" name="content">
                    <option value="">選択してください</option>
                    <option value="delivery" {{ old('content') === 'delivery' ? 'selected' : '' }}>商品のお届けについて</option>
                    <option value="exchange" {{ old('content') === 'exchange' ? 'selected' : '' }}>商品の交換について</option>
                    <option value="trouble" {{ old('content') === 'trouble' ? 'selected' : '' }}>商品トラブル</option>
                    <option value="contact" {{ old('content') === 'contact' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                    <option value="els" {{ old('content') === 'els' ? 'selected' : '' }}>その他</option>
                </select>

                <div class="form__error">
                    @error('content')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="detail">お問い合わせ内容 <span class="required">※</span></label>
                <textarea id="detail" name="detail" rows="5" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <button type="submit" class="submit-btn">確認画面</button>
        </form>
    </div>
</body>

</html>