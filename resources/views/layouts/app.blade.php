<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')
    <!-- <title>{{ config('app.name', 'Carveo') }}</title> -->

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <style>
        #menu div {
            margin-top: -1px;
        }

        #menu:hover div {
            display: block;
        }
    </style>
</head>


<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Carveo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        <li class="nav-item pt-2">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link " href="{{ route('seller.index') }}">Seller</a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link" href="{{ route('compare.index') }}">
                                <div class="p-0" style="display: inline-block !important">Compare
                                </div>
                                @if(Session::get('compare'))
                                <p class="m-0" style="display: inline-block">
                                    {{ count(Session::get('compare')) }}
                                </p>
                                @endIf
                            </a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link " href=" {{ route('eventplan.index') }}">Event Plan</a>
                        </li>
                        @else
                        @if(Auth::user()->role == 1)
                        <li class="nav-item pt-2">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link " href="{{ route('seller.index') }}">Seller</a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link" href="{{ route('compare.index') }}">
                                <div class="p-0" style="display: inline-block !important">Compare
                                </div>
                                @if(Session::get('compare'))
                                <p class="m-0" style="display: inline-block">
                                    {{ count(Session::get('compare')) }}
                                </p>
                                @endIf
                            </a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link " href=" {{ route('eventplan.index') }}">Event Plan</a>
                        </li>
                        @else
                        <li class="nav-item pt-2">
                            <a class="nav-link " href="{{ route('city.index') }}">City</a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link " href="{{ route('category.index') }}">Category</a>
                        </li>
                        @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        {{-- Seller Register --}}
                        @guest
                        <li class="nav-item" style="padding:14px 2rem 0 0">
                            <a href="{{route('login.seller')}}">Seller Login</a>
                        </li>
                        <li class="nav-item" style="padding:14px 2rem 0 0">
                            <a href="{{route('register.seller')}}">Become a Seller?</a>
                        </li>
                        @endguest

                        @guest
                        <li class="nav-item pt-1">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item pt-1">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @if(Auth::user()->role == 1)
                        {{-- <li class="nav-item" style="padding-top: 11px">

                        </li> --}}
                        <li class="nav-item pt-1 mr-2">
                            <a class="nav-link" href="{{ route('order.index') }}" data-toggle="tooltip" data-placement="top" title="Order">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <path d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item pt-1 mr-2">
                            <a class="nav-link" href="{{route('message.index')}}" data-toggle="tooltip" data-placement="top" title="Messages">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item pt-1 mr-2">
                            <a class="nav-link" href="{{ route('wishlist.index') }}" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </a>
                        </li>
                        @endif
                        <li id="menu" class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="padding-top: 11px">
                                {{ Auth::user()->name }}
                                {{ Auth::user()->business_name }}

                                @if(Auth::user()->image)
                                <img src="{{asset('/storage/'.Auth::user()->image)}}" class="rounded-circle" alt="" width="30" height="30" />
                                @elseif(Auth::user()->profile_picture)
                                <img src="{{asset('/storage/'.Auth::user()->profile_picture)}}" class="rounded-circle" alt="" width="30" height="30" />
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role == 1)
                                <a class="dropdown-item" href="{{ route('customer.show', Auth::user()->id) }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('transaction.index') }}">
                                    Transaction
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(session('message'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{session('message')}}
            </div>
        </div>
        @endif
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>

</html>