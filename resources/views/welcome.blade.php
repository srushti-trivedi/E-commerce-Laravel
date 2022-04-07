<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Phone | world</title>
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
        </style>
    </head>
    <body class="antialiased">
        <center><br><br><br>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <hr width="500">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        {{-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> --}}
                        <div class="row justify-content-center">
                            <div class="card">
                                <div class="col-md-8">
                                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                                        <div class="card-header">{{ __('Dashboard') }}</div>
                                    </a>
                                </div>
                                <div class="card-body">
                                        @if (session('status'))
                                            <div>
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        {{ __('You are logged in!') }}
                                    </div>
                                 </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        <hr width="300">

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            <hr width="500">
                        @endif
                            <br><hr width="300">
                        <a href="{{ route('products') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Products</a>
                            <hr width="300">
                        
                    @endauth
                </div>
            @endif
        </div>
    </center>

            <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    PHONEWORLD
                </div>
                <div class="subtitle">
                    @if (Lang::has('Color::example.welcome'))
                        {{ trans('Color::example.welcome') }}
                    @else
                        Welcome, this is WEBSITE.
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
