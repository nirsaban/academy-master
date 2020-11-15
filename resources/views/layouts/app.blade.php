<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ACADEMYJOB</title>
    <!-- Compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <!-- <link href="{{ asset('css/app.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href ="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href ="{{url('css/demo.css')}}">
    <link rel="stylesheet" href ="{{url('css/paper-dashboard.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}">

    <style>


    </style>
</head>
<body>

<!-- <nav> -->
    <!-- <div class="nav-wrapper  blue lighten-4"> -->
        <!-- <div class="container"> -->
        <!-- <a href="{{ url('/') }}" class="brand-logo ">OnClickJob</a> -->
        <!-- </div>
{{--    @guest--}}
{{--        @if (Route::has('register'))--}}
{{--            @endif--}}
{{--        @else--}}
{{--        <ul id="nav-mobile" class="right hide-on-med-and-down">--}}
{{--            <li>--}}
{{--                <a class="center" href="{{ route('logout') }}"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                    document.getElementById('logout-form').submit();">--}}
{{--                {{ __('Logout') }}</a>--}}
{{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--        @endguest--}}
    </div> -->
<!-- </nav> -->


            @yield('content')


</body>
</html>
