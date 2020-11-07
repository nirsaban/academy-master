<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnClickJob</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href ="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href ="{{url('css/paper-dashboard.css?v=2.0.1')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>



<body style="background: #f4f3ef">
<div class="wrapper" >
    <div class="main-panel" style="width: 100%">
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" style="background-color: #FFF !important">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="logo">
                        <div class="d-flex justify-content-center">
                        <img  onclick="window.location='{{url('/student')}}'"
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
                            <a class="nav-link btn-magnify" onclick="window.location='{{url('profile').'/'.Auth::id()}}'">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-magnify" onclick="window.location='{{url('/formatCv')}}'">
                                Send CV
                            </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Messages
                                <span id ='countMessage' style="background-color: rgb(179, 243, 243)" class="flow-text  navbar-toggler-bar navbar-kebab  "></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','old')">Old Messages</a>
                                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','profile')">Profile Messages</a>
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
        <input type="hidden" id="idToMessages" value="{{Auth::id()}}">
        @yield('content')
        @include('student.partials.modal')
    </div>
</div>

<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
<script src="{{asset('js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>
<script src="{{asset('js/paper-dashboard.js.map')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<script>
    $(document).ready(function(){
     $('.sidenav').sidenav();
     $(".dropdown-trigger").dropdown();
 });

</script>

<script src="{{asset('js/messages.js')}}"></script>
<script src="{{asset('js/student.js')}}"></script>
<script src="{{asset('js/profile.js')}}"></script>
<script src="{{asset('js/profileTest.js')}}"></script>
</body>
</html>
