@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
<header>
    <div class="header__item">
        <a href=""><h1 id="title" class="header__ttl">FashionablyLate</h1></a>
        <form action="" method="">
            @csrf
            <button class="header__button white-button">logout</button>
        </form>
    </div>
</header>

<body>
    <h2 class="ttl">Admin</h2>

    <form action="" method="">
        <div class="form">
            <input class="form__text" type="text" name="" placeholder="　名前やメールアドレスを入力してください">

            <div class="form__gender" >
                <select class="form__gender--select" name="gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>

            <div class="form__category">
                <select class="form__category--select" name="category" placeholder="　お問い合わせの種類">
                    <option value="">お問い合わせの種類</option>
                </select>
            </div>

            <div class="form__date">
                <input class="form__date--input" type="date" placeholder="年/月/日">
            </div>

            <button class="form__search brown-button">検索</button>

            <button class="form__reset beige-button">リセット</button>
        </div>
    </form>

    <div class="space">
        <div class="space__export">
            <button class="export-button">エクスポート</button>
        </div>
        <div class="space__pagenate">
            <p>pagenate</p>
        </div>
    </div>

    <div class="table">
        <table>
            <tr class="table__top">
                <th class="name">お名前</th>
                <th class="gender">性別</th>
                <th class="email">メールアドレス</th>
                <th class="category">お問い合わせの種類</th>
                <th class="button"></th>
            </tr>
            <tr class="table__content">
                <td class="name">山田　太郎</td>
                <td class="gender">男性</td>
                <td class="email">test@example.com</td>
                <td class="category">商品の交換について</td>
                <td class="button">
                    <form action="">
                        @csrf
                        <button class="white-button">詳細</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>
@endsection