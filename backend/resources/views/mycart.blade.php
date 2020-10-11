@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="mx-auto" style="max-width:1200px">
        <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
            {{ Auth::user()->name }}さんのカートの中身</h1>

        <div class="card-body">
            <p class="text-center font-weight-bold">{{ $message ?? '' }}</p><br>

            @if($my_carts->isNotEmpty())

            @foreach($my_carts as $my_cart)
            <div class="mycart_box">
                商品名 : {{$my_cart->stock->name}} <br>
                価格 : {{number_format($my_cart->stock->fee)}}円<br>
                <form action="cartupdate" method="post">
                    @csrf
                    <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                    <input type="number" name="cart_count" value="{{ $my_cart->cart_count }}" min="1"
                        style="text-align: center; width: 50px; margin: 5px auto;">
                    個
                    <input type="submit" value="変更">
                </form><br>
                <img src="/storage//image/{{$my_cart->stock->imgpath}}" alt="" class="incart">
                <br>

                <form action="/cartdelete" method="POST">
                    @csrf
                    <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                    <input type="submit" value="カートから削除する">
                </form>

            </div>
            @endforeach

            <div class="text-center pt-5" style="font-size:1.4em; font-weight:bold;">
                計：{{$total_count}}点<br>
                合計金額 : {{number_format($sum)}}円
            </div>
            <form action="/checkout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg text-center buy-btn">購入する</button>
            </form>

            @else
            <p class="text-center">カートに商品が入っていません。</p>
            @endif

            <div class="text-center">
                <a href="/">商品一覧へ</a>
            </div>
        </div>
    </div>

</div>
@endsection
