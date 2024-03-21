@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
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

    <form action="/admin/search" method="post">
        <div class="form">
            @csrf
            <input class="form__text" type="text" name="" placeholder="　名前やメールアドレスを入力してください" value="">

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
                    @foreach($categories as $categorie)
                        <option value="$categorie['content']">{{ $categorie['content'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form__date">
                <input class="form__date--input" type="date" value="" placeholder="年/月/日">
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
            {{ $contacts->links('vendor.pagination.tailwind') }}
        </div>
    </div>



    <div class="table">
        <table>
            <tr class="tr table__top">
                <th class="th name">お名前</th>
                <th class="th gender">性別</th>
                <th class="th email">メールアドレス</th>
                <th class="th category">お問い合わせの種類</th>
                <th class="th button"></th>
            </tr>

            @foreach($contacts as $contact)
                <tr class="tr table__content">
                    <td class="td name">{{ $contact['last_name'] }}  {{'  '}}  {{ $contact['first_name'] }}</td>
                    @if($contact['gender'] == 1)
                        <td class="td gender">男性</td>     
                        @elseif($contact['gender']== 2)
                        <td class="td gender">女性</td>
                        @else
                        <td class="td gender">その他</td>          
                    @endif
                    <td class="td email">{{ $contact['email'] }}</td>
                    <td class="td category">{{ $contact['category']['content'] }}</td>
                    <td class="td button">
                        <form action="/modal" method="post" name="id" value="{{ $contact['id'] }}">
                            @csrf
                            <input type="hidden" name="name" value="{{ $contact['last_name'] }}  {{'  '}}  {{ $contact['first_name'] }}">
                            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                            <input type="hidden" name="email" value="{{ $contact['email'] }}">
                            <input type="hidden" name="tell" value="{{ $contact['tell'] }}">
                            <input type="hidden" name="address" value="{{ $contact['address'] }}">
                            <input type="hidden" name="building" value="{{ $contact['building'] }}">
                            <input type="hidden" name="category" value="{{ $contact['category']['content'] }}">
                            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                            <button class="white-button">詳細</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </table>
    </div>

    @if(isset($showModal))
    <div class="modal">
        <form action="/admin" method="get">
            @csrf
            <div class="modal__btn--back">
                <button class="modal__btn--back-btn">×</button>
            </div>
        </form>
        
        <table class="modal__table">
            <tr class="modal__table--tr">
                <th class="modal__table--th">お名前</th>
                <td class="modal__table--td">{{ $requests['name'] }}</td>
            </tr>
            <tr class="modal__table--tr">
                <th class="modal__table--th">性別</th>
                <td class="modal__table--td">
                    @if($requests['gender'] == 1)
                        男性     
                        @elseif($requests['gender']== 2)
                        女性
                        @else
                        その他     
                    @endif
                </td>
            </tr>
            <tr class="modal__table--tr">
                <th class="modal__table--th">メールアドレス</th>
                <td class="modal__table--td">{{ $requests['email'] }}</td>
            </tr>
            <tr class="modal__table--tr">
                <th class="modal__table--th">電話番号</th>
                <td class="modal__table--td">{{ $requests['tell'] }}</td>
            </tr>
            <tr class="modal__table--tr">
                <th class="modal__table--th">住所</th>
                <td class="modal__table--td">{{ $requests['address'] }}</td>
            </tr>
            <tr class="modal__table--tr">
                <th class="modal__table--th">建物名</th>
                <td class="modal__table--td">{{ $requests['building'] }}</td>
            </tr>
            <tr class="modal__table--tr">
                <th class="modal__table--th">お問い合わせの種類</th>
                <td class="modal__table--td">{{ $requests['category'] }}</td>
            </tr>
            <tr class="modal__table--tr">
                <th class="modal__table--th">お問い合わせ内容</th>
                <td class="modal__table--td">{{ $requests['detail'] }}</td>
            </tr>
        </table>

        <form action="/admin/delete" method="post">
            @csrf
            <div class="modal__btn--delete">
                <button class="modal__btn--delete-btn red-button">削除</button>
            </div>
        </form>
    </div>
    @endif
</body>
@endsection