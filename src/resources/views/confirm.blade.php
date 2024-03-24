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
            <td class="confirm__table--right">{{ $requests['last_name'] }} {{ $requests['first_name'] }}</td>
        </tr>
        <tr>
            <td class="confirm__table--left">性別</td>
            <td class="confirm__table--right">
                @if($requests['gender'] == "1")
                男性
                @elseif($requests['gender'] == "2")
                女性
                @elseif($requests['gender'] == "3")
                その他
                @endif
                
            </td>
        </tr>
        <tr>
            <td class="confirm__table--left">メールアドレス</td>
            <td class="confirm__table--right">{{ $requests['email'] }}</td>
        </tr>
        <tr>
            <td class="confirm__table--left">電話番号</td>
            <td class="confirm__table--right">{{ $requests['tell'] . $requests['tell2'] . $requests['tell3'] }}</td>
        </tr>
        <tr>
            <td class="confirm__table--left">住所</td>
            <td class="confirm__table--right">{{ $requests['address'] }}</td>
        </tr>
        <tr>
            <td class="confirm__table--left">建物名</td>
            <td class="confirm__table--right">{{ $requests['address2'] }}</td>
        </tr>
        <tr>
            <td class="confirm__table--left">お問い合わせの種類</td>
            <td class="confirm__table--right">{{ $requests['category_id'] }}</td>
        </tr>
        <tr>
            <td class="confirm__table--left">お問い合わせ内容</td>
            <td class="confirm__table--right">{{ $requests['detail'] }}</td>
        </tr>
    </table>
    <form class="confirm__button" action="?" method="post">
        @csrf
        <input type="hidden" name="first_name" value="{{ $requests['first_name'] }}">
        <input type="hidden" name="last_name" value="{{ $requests['last_name'] }}">
        <input type="hidden" name="gender" value="{{ $requests['gender'] }}">
        <input type="hidden" name="email" value="{{ $requests['email'] }}">
        <input type="hidden" name="tell" value="{{ $requests['tell'] . $requests['tell2'] . $requests['tell3'] }}">
        <input type="hidden" name="address" value="{{ $requests['address'] }}">
        <input type="hidden" name="building" value="{{ $requests['address2'] }}">
        <input type="hidden" name="category_id" value="                @if($requests['category_id'] == "3. 商品トラブル")
        3
        @elseif($requests['category_id'] == "1. 商品のお届けについて")
        1
        @elseif($requests['category_id'] == "2. 商品の交換について")
        2
        @elseif($requests['category_id'] == "4. ショップへのお問い合わせ")
        4
        @elseif($requests['category_id'] == "5. その他")
        5
        @endif">
        <input type="hidden" name="detail" value="{{ $requests['detail'] }}">
        <div>
            <button formaction="/thanks" class="brown-button">送信</button>
        </div>
        <div>
            <button formaction="/" class="clear-button">修正</button>
        </div>
    </form>
</body>



@endsection