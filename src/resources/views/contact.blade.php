@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
@endsection

@section('content')
<header>
    <div>
        <a href=""><h2 class="header__ttl">FashionablyLate</h2></a>
    </div>
</header>

<body>
    <h2 class="ttl">Contact</h2>
        <form action="/confirm" method="post">
            @csrf
            <table class="contact__form">
                <tr class="contact__form--tr">
                    <td class="contact__form--left">お名前 <span class="caution">※</span></td>
                    <td class="contact__form--right">
                        <input class="contact__form--name-left" type="text" name="last_name" value="" placeholder="　　例：山田">
                        <input class="contact__form--name-right" type="text" name="first_name" value="" placeholder="　　例：太郎">
                    </td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left"></td>
                    <td class="contact__form--right">
                        @if($errors->has('first_name'))
                            <div class="message__error message__error--left"> <span class="caution">※  </span>{{ $errors->first('first_name') }}</div>
                        @endif
                        @if($errors->has('last_name'))
                            <div class="message__error message__error--right"> <span class="caution">※  </span>{{ $errors->first('last_name') }}</div>
                        @endif
                    </td>
                </tr>

                <tr class="contact__form--tr">
                    <td class="contact__form--left">性別 <span class="caution">※</span></td>
                    <td class="contact__form--right contact__form--sex">
                            <input class="contact__form--radio" type="radio" name="gender" value="1" {{ old('gender',1) == '1' ? 'checked' : '' }}><span class="contact__form--sex-item">男性</span>
                            <input class="contact__form--radio" type="radio" name="gender" value="2"><span class="contact__form--sex-item">女性</span>
                            <input class="contact__form--radio" type="radio" name="gender" value="3"><span class="contact__form--sex-item">その他</span>
                    </td>
                <tr class="contact__form--tr">
                    <td class="contact__form--left"></td>
                    <td class="contact__form--right">
                        @if($errors->has('gender'))
                            <div class="message__error"> <span class="caution">※  </span>{{ $errors->first('gender') }}</div>
                        @endif
                    </td>
                </tr>
                </tr>

                <tr class="contact__form--tr">
                    <td class="contact__form--left">メールアドレス <span class="caution">※</span></td>
                    <td class="contact__form--right"><input  class="contact__form--email" type="email" name="email" placeholder="　　例：test@example.com"></td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left"></td>
                    <td class="contact__form--right">
                        @if($errors->has('email'))
                            <div class="message__error"> <span class="caution">※  </span>{{ $errors->first('email') }}</div>
                        @endif
                    </td>
                </tr>

                <tr class="contact__form--tr">
                    <td class="contact__form--left">電話番号 <span class="caution">※</span></td>
                    <td  class="contact__form--right">
                        <input class="contact__form--tel" type="tel" name="tell" value="" placeholder="080" size="3" maxlength="3">
                        <p class="contact__form---" >-</p>
                        <input class="contact__form--tel"  type="tel" name="tell2" value="" placeholder="1234" size="4" maxlength="4">
                        <p class="contact__form---" >-</p>
                        <input class="contact__form--tel"  type="tel" name="tell3" value="" placeholder="5678" size="4" maxlength="4">
                    </td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left"></td>
                    <td class="contact__form--right">
                        @if($errors->has('tell'))
                            <div class="message__error"> <span class="caution">※  </span>{{ $errors->first('tell') }}</div>
                        @endif
                    </td>
                </tr>

                <tr class="contact__form--tr">
                    <td class="contact__form--left">住所 <span class="caution">※</span></td>
                    <td class="contact__form--right">
                        <input class="contact__form--address" type="address" name="address" value="" placeholder="　　例：東京都渋谷区千駄ヶ谷1-2-3">
                    </td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left"></td>
                    <td class="contact__form--right">
                        @if($errors->has('address'))
                            <div class="message__error"> <span class="caution">※  </span>{{ $errors->first('address') }}</div>
                        @endif
                    </td>
                </tr>

                <tr class="contact__form--tr">
                    <td class="contact__form--left">建物名</td>
                    <td class="contact__form--right">
                        <input class="contact__form--address" type="address2" name="address2" value="" placeholder="　　例：千駄ヶ谷マンション101">
                    </td>
                </tr>

                <tr class="contact__form--tr">
                    <td class="contact__form--left">お問い合わせの種類 <span class="caution">※</span></td>
                    <td class="contact__form--right contact__form--select">
                        <select class="contact__form--category" name="category_id" value="">
                            <option><span class="contact__form--option">選択してください</span></option>
                            @foreach($categories as $category)
                                <option><span class="contact__form--option">{{ $category['content'] }}</span></option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left"></td>
                    <td class="contact__form--right">
                        @if($errors->has('category'))
                            <div class="message__error"> <span class="caution">※  </span>{{ $errors->first('category') }}</div>
                        @endif
                    </td>
                </tr>

                <tr class="contact__form--tr">
                    <td class="contact__form--left contact__form--content">お問い合わせ内容 <span class="caution">※</span></td>
                    <td class="contact__form--right"><textarea class="contact__form--textarea"  name="detail" id="" cols="" rows="5" placeholder="　　お問い合わせ内容をご記載ください"></textarea></td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left"></td>
                    <td class="contact__form--right">
                        @if($errors->has('detail'))
                            <div class="message__error"> <span class="caution">※  </span>{{ $errors->first('detail') }}</div>
                        @endif
                    </td>
                </tr>

            </table>
            <div class="contact__button">
                <button class="brown-button">確認画面</button>
            </div>
            <input type="submit" value="dfsd">
        </form>

</body>
@endsection