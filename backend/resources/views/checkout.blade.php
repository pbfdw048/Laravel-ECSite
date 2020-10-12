@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h2 class="text-center text-secondary font-weight-bold pt-4">
                {{ Auth::user()->name }}さんご購入ありがとうございました</h2>

            <div class="card-body text-center">
                <p>ご登録頂いたメールアドレスへ購入情報をお送りしております。ご確認ください。</p>
                <a href="/">商品一覧へ</a>
            </div>
        </div>
    </div>
</div>
@endsection