@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks">
        <p class="thanks__thank">Thank you</p>
        <p class="thanks__text">お問い合わせありがとうございました</p>
        <div class="thanks__button">
            <form action="/" method="post">
                @csrf
                <button class="thanks__button--button brown-button">HOME</button>
            </form>   
        </div>
    </div>
@endsection