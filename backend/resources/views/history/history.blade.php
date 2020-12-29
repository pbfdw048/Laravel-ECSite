@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="mx-auto" style="max-width:1200px">
        <h2 class="text-center text-secondary font-weight-bold pt-4">
            {{ Auth::user()->name }}さんの購入履歴</h2>

        <div class="card-body">

            @if($my_carts->isNotEmpty())

            @foreach($my_carts as $my_cart)
            <div class="mycart_box">
                <a href="{{ url('/history/' . $my_cart->cart_version) }}" style="color:#000000; text-decoration:none;">
                    {{$my_cart->created_at}} <br>
                    {{$my_cart->stock->name}} {{number_format($my_cart->stock->fee)}}円 数量({{ $my_cart->cart_count }})
                </a>
                <img src="{{Storage::disk('s3')->url($my_cart->stock->imgpath)}}" alt="" class="incart">
                <br>
                <button class="ml-2"
                    onclick="location.href='{{ url('/history/' . $my_cart->cart_version) }}' ">詳細へ</button>
            </div>
            @endforeach



            @else
            <p class="text-center">{{ Auth::user()->name }}さんはまだ商品を購入していません</p>
            @endif
        </div>

    </div>

</div>
<div class="" style="width: 120px; margin: 20px auto;">
    {{$my_carts->links()}}
</div>
@endsection
