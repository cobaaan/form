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
                        <input class="contact__form--name-left" type="text" name="last-name" value="" placeholder="　　例：山田">
                        <input class="contact__form--name-right" type="text" name="first-name" value="" placeholder="　　例：太郎">
                    </td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left">性別 <span class="caution">※</span></td>
                    <td class="contact__form--right contact__form--sex">
                            <input class="contact__form--radio" type="radio" name="test" value=""><span class="contact__form--sex-item">男性</span>
                            <input class="contact__form--radio" type="radio" name="test" value=""><span class="contact__form--sex-item">女性</span>
                            <input class="contact__form--radio" type="radio" name="test" value=""><span class="contact__form--sex-item">その他</span>
                    </td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left">メールアドレス <span class="caution">※</span></td>
                    <td class="contact__form--right"><input  class="contact__form--email" type="email" name="email" placeholder="　　例：test@example.com"></td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left">電話番号 <span class="caution">※</span></td>
                    <td  class="contact__form--right">
                        <input class="contact__form--tel" type="tel" name="tel" value="" placeholder="080" size="3" maxlength="3">
                        <p class="contact__form---" >-</p>
                        <input class="contact__form--tel"  type="tel" name="tel" value="" placeholder="1234" size="4" maxlength="4">
                        <p class="contact__form---" >-</p>
                        <input class="contact__form--tel"  type="tel" name="tel" value="" placeholder="080" size="4" maxlength="4">
                    </td>

                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left">住所 <span class="caution">※</span></td>
                    <td class="contact__form--right">
                        <input class="contact__form--address" type="address-level1" name="add-level1" value="" placeholder="　　例：東京都渋谷区千駄ヶ谷1-2-3">
                    </td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left">建物名 <span class="caution">※</span></td>
                    <td class="contact__form--right">
                        <input class="contact__form--address" type="address-level2" name="add-level2" value="" placeholder="　　例：千駄ヶ谷マンション101">
                    </td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left">お問い合わせの種類 <span class="caution">※</span></td>
                    <td class="contact__form--right contact__form--select">
                        <select class="contact__form--category" name="category" value="">
                            <option value=""><span class="contact__form--option">選択してください</span></option>
                        </select>
                    </td>
                </tr>
                <tr class="contact__form--tr">
                    <td class="contact__form--left contact__form--content">お問い合わせ内容 <span class="caution">※</span></td>
                    <td class="contact__form--right"><textarea class="contact__form--textarea"  name="" id="" cols="" rows="5" placeholder="　　お問い合わせ内容をご記載ください"></textarea></td>
                </tr>
            </table>
            <div class="contact__button">
                <button class="brown-button">確認画面</button>
            </div>
        </form>
</body>
@endsection