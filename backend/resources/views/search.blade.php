@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h2 class="text-center text-secondary font-weight-bold pt-4">
                {{ $name }}の検索結果（{{ $count }}件）
            </h2>
            <form action="/search" method="post" class="text-right">
                @csrf
                <input type="text" name="search" placeholder="商品名かタグ名で検索">
                <input type="button" value="検索">
            </form>
            <div class="">
                <div class=" d-flex flex-row flex-wrap">

                    @foreach($stocks as $stock)

                    <div class="col-sm-6 col-md-4 ">
                        <div class="mycart_box">
                            {{$stock->name}} <br>
                            {{number_format($stock->fee)}}円<br>
                            <img src="/storage/{{$stock->imgpath}}" alt="" class="incart">
                            <br>
                            {{$stock->detail}} <br>

                            @foreach ($stock->tags as $tag)
                            <a href="/tag/{{ $tag->name }}"><span
                                    class='badge badge-success'>{{ $tag->name }}</span></a>
                            @endforeach

                            <form action="/mycart" method="post">
                                @csrf
                                <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                <input type="number" name="cart_count" value="1" min="1"
                                    style="text-align: center; width: 50px; margin: 5px auto;"> 個<br>
                                <input type="button" value="カートに入れる">
                            </form>
                        </div>
                    </div>

                    @endforeach

                </div>
                <div class="text-center" style="width: 150px; margin: 20px auto;">
                    {{ $stocks->links()}}
                </div>

                @if ( $stocks->hasPages())
                <p class="text-center h5"><span
                        class="font-weight-bold">{{ $stocks->currentPage() }}ページ目</span>（{{ $count }}件中
                    {{ $stocks->firstItem() }}~{{ $stocks->lastItem() }}件）
                </p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
