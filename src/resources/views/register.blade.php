@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<header>
    <div class="header__item">
        <a href=""><h1 id="title" class="header__ttl">FashionablyLate</h1></a>
        <form action="" method="">
            @csrf
            <button class="header__button white-button">login</button>
        </form>
    </div>
</header>

<body>
    <h2 class="ttl">Register</h2>

    <div class="login">
        <form action="" method="">
            @csrf
            <div class="login__email">
                <h2 class="login__text">お名前</h2>
                <input class="login__input" type="text" name="name" placeholder="　　例：田中　太郎">
            </div>
            <div class="login__email">
                <h2 class="login__text">メールアドレス</h2>
                <input class="login__input" type="email" name="email" placeholder="　　例：test@example.com">
            </div>
            <div class="login__password">
                <h2 class="login__text">パスワード</h2>
                <input class="login__input" type="password" name="pass" placeholder="　　例：coachtech1106">
            </div>
            <div class="login__button"><button class="brown-button">登録</button></div>
        </form>
    </div>
</body>
@endsection