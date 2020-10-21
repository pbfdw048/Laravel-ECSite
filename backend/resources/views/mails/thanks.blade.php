@component('mail::message')
# 購入情報

## {{ $user }}様
この度は{{ config('app.name') }}のご利用ありがとうございます。<br>
ご購入いただいた商品は<br>

@component('mail::table')
|商品名 |価格 |数量 |
|:-:|:-:|:-:|
@foreach ($checkout_items as $item)
|{{ $item->stock->name }} |{{ number_format($item->stock->fee) }}円 | {{ $item->cart_count }} |
@endforeach
@endcomponent

以上、計{{ $total_count }}点 合計{{ number_format($sum) }}円となります。<br>

@component('mail::button', ['url' => $url , 'color' =>'success'])
購入情報の詳細
@endcomponent

またのご利用をお待ちしております。<br>
今後とも{{ config('app.name') }}をよろしくお願いいたします。


@endcomponent
