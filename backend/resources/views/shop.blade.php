@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
            <div class="">
                <div class="d-flex flex-row flex-wrap">

                    @foreach($stocks as $stock)


                    <div class="col-sm-6 col-md-4 ">
                        <div class="mycart_box">
                            {{$stock->name}} <br>
                            {{number_format($stock->fee)}}円<br>
                            <img src="/image/{{$stock->imgpath}}" alt="" class="incart">
                            <br>
                            {{$stock->detail}} <br>

                            {{-- 追加 --}}

                            <form action="mycart" method="post">
                                @csrf
                                <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                <input type="number" name="cart_count" value="1" min="1"
                                    style="text-align: center; width: 50px; margin: 5px auto;"> 個<br>
                                <input type="submit" value="カートに入れる">
                            </form>

                            {{-- ここまで --}}
                        </div>


                    </div>
                    @endforeach
                </div>
                <div class="text-center" style="width: 150px; margin: 20px auto;">
                    {{ $stocks->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection