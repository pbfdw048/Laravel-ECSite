@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="mx-auto" style="max-width:1200px">
        <h2 class="text-center text-secondary font-weight-bold pt-4">
            {{ Auth::user()->name }}さんの購入詳細</h2>
        <div class="card-body">
            @if($my_carts->isNotEmpty())

            @foreach($my_carts as $my_cart)
            @if ($loop->first)
            <h3 class="text-right " style="color:#555555;font-size:1.4em; ">
                【購入日時】 {{ $my_cart->created_at }}
            </h3>
            @endif
            <div class="mycart_box">
                商品名 : {{$my_cart->stock->name}} <br>
                価格 : {{number_format($my_cart->stock->fee)}}円<br>
                数量 : {{ $my_cart->cart_count }}<br>
                <img src="/storage/image/{{$my_cart->stock->imgpath}}" alt="" class="incart">
                <br>



            </div>
            @endforeach

            <div class="text-center p-2" style="font-size:1.2em; font-weight:bold;">
                計 ： {{$total_count}}点<br>
                <p>合計金額 : {{number_format($sum)}}円</p>
            </div>


            @else
            <p class="text-center">{{ Auth::user()->name }}さんはまだ商品を購入していません</p>
            @endif

            <div class="text-center">
                <a href="/">商品一覧へ</a>
            </div>
        </div>
    </div>

</div>
@endsection