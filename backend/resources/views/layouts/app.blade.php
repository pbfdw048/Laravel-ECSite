<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color:#0092b3; color:#fefefe;">
            <div class="container">
                <a class="navbar-brand" style="color:#fefefe; font-size:1.4em" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" style="border-color:#fefefe;" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" style="color:#fefefe;" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="color:#fefefe;"
                                href="{{ route('register') }}">{{ __('会員登録') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="color:#fefefe;" class="nav-link dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                style="background-color:#9fe7f7;">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>


                                <a class="dropdown-item" href="{{ url('/mycart') }}">
                                    カートを見る
                                </a>
                                <a class="dropdown-item" href="{{ url('/history') }}">
                                    購入履歴を見る
                                </a>
                            </div>
                        </li>


                        <a class="m-1" href="{{ url('/mycart') }}">
                            <img src="{{ asset('/storage/images/cart.png') }}" class="cart">
                        </a>
                        <a class="m-1" href="{{ url('/history') }}">
                            <img src="{{ asset('/storage/images/history.png') }}" class="cart">
                        </a>

                        @endguest


                    </ul>
                </div>
            </div>
        </nav>

        @if (session('msg_danger'))
        <div class="flash_message bg-danger text-center text-white p-4 mt-5 mx-auto w-75">
            {{ session('msg_danger') }}
        </div>
        @endif

        @if (session('msg_success'))
        <div class="flash_message bg-success text-center text-white p-4 mt-5 mx-auto w-75">
            {{ session('msg_success') }}
        </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer_design" style="background-color:#0092b3;">

            @guest
            <p class=" nav-item" style="display:inline;">
                <a class="nav-link" href="{{ route('login') }}"
                    style="color:#fefefe; display:inline;">{{ __('ログイン') }}</a>

                @if (Route::has('register'))

                <a class="nav-link" href="{{ route('register') }}"
                    style="color:#fefefe; display:inline;">{{ __('会員登録') }}</a>
            </p>
            @endif

            @endguest
            <br>
            <div style="margin-top:24px;">
                なんでも売ります<br>
                <a style="font-size:2.4em; color:#fefefe; text-decoration:none;" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a><br>
            </div>

            <p style="font-size:0.7em;">@copyright @mukae9</p>

        </footer>
    </div>
</body>

</html>
