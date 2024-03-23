@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<header>
    <div class="header__item">
        <a href="/register"><h1 id="title" class="header__ttl">FashionablyLate</h1></a>
        <form action="/register" method="get">
            @csrf
            <button class="header__button white-button">register</button>
        </form>
    </div>
</header>

<body>
    <h2 class="ttl">Login</h2>

    <div class="login">
        <form action="/login" method="post">
            @csrf
            <div class="login__email">
                <h2 class="login__text">メールアドレス</h2>
                <input class="login__input" type="email" name="email" placeholder="　　例：test@example.com">
            @if($errors->has('email'))
                <div class="message__error">{{ $errors->first('email') }}</div>
            @endif
            </div>

            <div class="login__password">
                <h2 class="login__text">パスワード</h2>
                <input class="login__input" type="password" name="password" placeholder="　　例：coachtech1106">
            @if($errors->has('password'))
                <div class="message__error">{{ $errors->first('password') }}</div>
            @endif
            </div>

            <div class="login__button"><button class="brown-button">ログイン</button></div>
        </form>
    </div>
</body>
@endsection