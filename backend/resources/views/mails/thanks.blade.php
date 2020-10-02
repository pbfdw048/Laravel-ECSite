@component('mail::message')
# 購入情報

## {{ $user }}様
この度は{{ config('app.name') }}のご利用ありがとうございます。<br>
ご購入いただいた商品は

@foreach ($checkout_items as $item)
- {{ $item->stock->name }}｜{{ number_format($item->stock->fee) }}円
@endforeach

以上{{ $cart_data['count'] }}点 合計{{ number_format($cart_data['sum']) }}円となります。<br>

@component('mail::button', ['url' => '', 'color' => 'success'])
購入情報の詳細
@endcomponent

またのご利用をお待ちしております。<br>
今後とも{{ config('app.name') }}をよろしくお願いいたします。


@endcomponent
