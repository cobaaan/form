@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('content')
<!--
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
                            <input type="hidden" name="id" value="{{ $contact['id'] }}">
                            <button class="white-button">詳細</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </table>
    </div>
-->
<p>{{ $requests['date'] }}</p>
@foreach($contacts as $contact)
<p>{{ $contact['created_at'] }}</p>
@endforeach

@endsection