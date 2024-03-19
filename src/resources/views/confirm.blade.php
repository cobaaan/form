@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<header>
    <div>
        <a href=""><h2 class="header__ttl">FashionablyLate</h2></a>
    </div>
</header>

<body>
    <h2 class="ttl">Confirm</h2>

    <table class="confirm__table">
        <tr>
            <td class="confirm__table--left">お名前</td>
            <td class="confirm__table--right">山田太郎</td>
        </tr>
        <tr>
            <td class="confirm__table--left">性別</td>
            <td class="confirm__table--right">男性</td>
        </tr>
        <tr>
            <td class="confirm__table--left">メールアドレス</td>
            <td class="confirm__table--right">test@example.com</td>
        </tr>
        <tr>
            <td class="confirm__table--left">電話番号</td>
            <td class="confirm__table--right">08012345678</td>
        </tr>
        <tr>
            <td class="confirm__table--left">住所</td>
            <td class="confirm__table--right">東京都渋谷区千駄ヶ谷1-2-3</td>
        </tr>
        <tr>
            <td class="confirm__table--left">建物名</td>
            <td class="confirm__table--right">千駄ヶ谷マンション101</td>
        </tr>
        <tr>
            <td class="confirm__table--left">お問い合わせの種類</td>
            <td class="confirm__table--right">商品の交換について</td>
        </tr>
        <tr>
            <td class="confirm__table--left">お問い合わせ内容</td>
            <td class="confirm__table--right">届いた商品が注文した商品ではありませんでした。<br>商品の取り替えをお願いします。</td>
        </tr>
    </table>
    <form class="confirm__button" action="" name="confirm">
        @csrf
        <div>
            <button class="brown-button">送信</button>
        </div>
        <div>
            <button class="clear-button">修正</button>
        </div>
    </form>
</body>
@endsection