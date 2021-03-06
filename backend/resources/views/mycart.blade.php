@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="mx-auto" style="max-width:1200px">
        @if ( $message ?? '')
        <p class="text-center font-weight-bold bg-info p-4 mt-3 mx-auto w-75">{{ $message ?? '' }}</p><br>
        @endif

        <h2 class="text-center text-secondary font-weight-bold pt-4">
            {{ Auth::user()->name }}さんのカートの中身</h2>

        <div class="card-body">

            @if($my_carts->isNotEmpty())

            @foreach($my_carts as $my_cart)

            <div class="mycart_box">
                商品名 : {{$my_cart->stock->name}} <br>
                価格 : {{number_format($my_cart->stock->fee)}}円<br>
                <form action="/cartupdate" method="post">
                    @csrf
                    <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                    <input type="number" name="cart_count" value="{{ $my_cart->cart_count }}" min="1"
                        style="text-align: center; width: 60px; margin: 5px auto;">
                    個
                    <input type="button" value="変更">
                </form>
                <br>
                <img src="{{Storage::disk('s3')->url($my_cart->stock->imgpath)}}" alt="" class="incart">
                <br>
                <span class="h5 font-weight-bold">{{$my_cart->stock->detail}} </span><br>

                @foreach ($my_cart->stock->tags as $tag)
                <a class="h5" href="/tag/{{ $tag->name }}"><span class='badge badge-success'>{{ $tag->name }}</span></a>
                @endforeach

                <form action="/cartdelete" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                    <input type="button" value="カートから削除する">
                </form>

            </div>

            @endforeach

            <div class="text-center pt-5" style="font-size:1.4em; font-weight:bold;">
                計：{{$total_count}}点<br>
                合計金額 : {{number_format($sum)}}円
            </div>
            <form action="/checkout" method="POST">
                @csrf
                <input type="button" value="購入する" class="btn btn-danger btn-lg text-center buy-btn">
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
