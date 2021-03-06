<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('messages.welcome') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Script-->
    <script src="{{ asset('bower_components/jquery/dist/jquery.js') }}"></script>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                @if (Auth::check() && Auth::user()->role_id == 0)
                    <a class="navbar-brand" href="{{ route('dashboard') }}">{{ trans('messages.vehicle shop') }}</a>
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">{{ trans('messages.vehicle shop') }}</a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">{{ trans('messages.login') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ trans('messages.register') }}</a></li>
                    @else
                        @if (Auth::check() && Auth::user()->role_id == 1)
                            <li>
                                <a href="{{ route('checkout') }}">{{ trans('messages.checkout') }}</a>
                            </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('editProfile', Auth::user()->id) }}">{{ trans('messages.profile') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('changePassword', Auth::user()->id) }}">{{ trans('messages.change password') }}</a>
                                </li>
                                @if (Auth::check() && Auth::user()->role_id == 1)
                                    <li>
                                        <a href="{{ route('rentingInfo') }}">{{ trans('messages.renting') }}</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ trans('messages.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <br>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-1 text-center text-white">Copyright &copy; vanhauna</p>
        </div>
    </footer>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" divscript></script>
</body>
</html>
