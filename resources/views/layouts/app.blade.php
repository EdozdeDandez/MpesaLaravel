<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            {{--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>--}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @guest
            <main class="py-4">
                @yield('content')
            </main>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <ul class="nav flex-column">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Agents</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('agents.new') }}" class="dropdown-item">New</a>
                                    <a href="{{ route('agents.show') }}" class="dropdown-item">View</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Customers</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('customer.add') }}" class="dropdown-item">New</a>
                                    <a href="{{ route('customers.show') }}" class="dropdown-item">View</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('product.add') }}" class="dropdown-item">New</a>
                                    <a href="{{ route('products.show') }}" class="dropdown-item">View</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('service.add') }}" class="dropdown-item">New</a>
                                    <a href="{{ route('services.show') }}" class="dropdown-item">View</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"href="{{ route('transactions.view') }}">Transactions</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Other users</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('register') }}" class="dropdown-item">New</a>
                                    <a href="#" class="dropdown-item">View</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div id="content" class="col-md-10">
                        <main>
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
        @endguest
    </div>
</body>
</html>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
</script>
