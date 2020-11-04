<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnClickJob</title>
    <!-- Compiled and minified CSS -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href ="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href ="{{url('css/paper-dashboard.css?v=2.0.1')}}">

    <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <!-- <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.4.3/jspdf.plugin.autotable.js" integrity="sha256-DR7s6I3Jr2Moz+m3PV3zs0NqQCjHPso/FlPJ5ERhNsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha256-DupmmuWppxPjtcG83ndhh/32A9xDMRFYkGOVzvpfSIk=" crossorigin="anonymous"></script>
    <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <!-- <script src="{{asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script> -->
    <!-- <link rel="stylesheet" href="{{mix('css/app.css')}}"> -->
</head>


<body style="background: #f4f3ef">

<div class="wrapper">
    <div class="main-panel" style="width: 100%">
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" style="background-color: #FFF !important">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="logo">
                        <div class="d-flex justify-content-center">
                            <img
                                class="img-fluid"
                                src="{{asset('images/logo.jpeg')}}"
                                width="100"
                            />
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-magnify"  href="{{url('/employer')}}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-magnify"  href="{{url('job/create')}}">
                                Create new job
                            </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Messages
                                <span id ='countMessage' style="background-color: rgb(179, 243, 243)" class="flow-text  navbar-toggler-bar navbar-kebab  "></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','old')">Old Messages</a>
                                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','profile')">Messages About Jobs</a>
                            </div>
                        </li>
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-bell-55"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
</div>
<!-- <section class="top-nav">
    <div>
        OnClickJOb
    </div>
    <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
    </label>
    <ul class="menu">
        <li>
            <a class="nav-link" href="{{url('/employer')}}">
                Home

            </a>
        </li>
        <li>
            <a class="nav-link" href='{{url('job/create')}}'>

                Create new job
            </a>
        </li>
        <li>
        <li class="nav-item dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>  <span style="padding: 0" class="badge badge-info" id="countMessage"></span><i class="fas fa-comments  " ></i>
                <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg-left" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','old')">
                    old message
                </a>
                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','profile')">
                    messages about jobs
                </a>
            </div>
        </li>
        </li>
        <li><li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li></li>

    </ul>
</section> -->
<input type="hidden" id="idToMessages" value="{{Auth::id()}}">
<!-- <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}"> -->
@include('.employer.partials.modal')

<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
<script src="{{asset('js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>
<script src="{{asset('js/paper-dashboard.js.map')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- <script src="{{mix('js/app.js')}}"></script> -->
<script src ="{{asset('js/employer.js')}}"></script>
<script src ="{{asset('js/messages.js')}}"></script>
</body>
</html>
