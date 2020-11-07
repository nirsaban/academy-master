
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title></title>
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href ="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href ="{{url('css/paper-dashboard.css?v=2.0.1')}}">


    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
<!-- {{--    <link rel="stylesheet" href ="{{url('css/dashboard.css')}}">--}} -->

</head>
<body style="background: #f4f3ef">

<div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <div class="">
                <img
                    class="img-fluid"
                    src="{{asset('images/logo.jpeg')}}"
                    width="200"
                />
            </div>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
            <li>
                <a href="{{url('/admin')}}">
                <i class="nc-icon nc-bank"></i>
                <p style="line-height: 2.6em">DASHBOARD</p>
                </a>
            </li>
            <li>
                <a href="{{url('/Courses')}}">
                <i class="nc-icon nc-tile-56"></i>
                <p style="line-height: 2.6em">ALL COURSES</p>
                </a>
            </li>
            <li>
                <a href="{{url('/createCourse')}}">
                <i class="nc-icon nc-tv-2"></i>
                <p style="line-height: 2.6em">CREATE COURSE</p>
                </a>
            </li>
            <li>
                <a href="{{url('/allStudents')}}">
                <i class="nc-icon nc-caps-small"></i>
                <p style="line-height: 2.6em">ALL STUDENTS</p>
                </a>
            </li>
            <li>
                <a href="{{url('/allJobPosts')}}">
                <i class="nc-icon nc-bullet-list-67"></i>
                <p style="line-height: 2.6em">ALL JOBS</p>
                </a>
            </li>
            <li>
                <a href="{{url('/addPlacement')}}">
                <i class="nc-icon nc-simple-add"></i>
                <p style="line-height: 2.6em">ADD NEW PLACEMENT USER</p>
                </a>
            </li>
            <li style="font-weight: bold; font-size: 16px; margin-top: 20px; margin-left: 10px">
                Add New Report
            </li>
            <li>
                <a href="javascript:;">
                <p style="line-height: 2.6em">CURRENT MONTH</p>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                <p style="line-height: 2.6em">LAST QUARTER</p>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                <p style="line-height: 2.6em">SOCIAL ENGAGEMENT</p>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                <p style="line-height: 2.6em">YEAR END SALE</p>
                </a>
            </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" >
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <!-- <a class="navbar-brand" href="javascript:;">{localStorage.getItem('currentPage')}</a> -->
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
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
            {{--        @if(Session::get('sm'))--}}
{{--            <div class="container">--}}
{{--                <div class="alert alert-success text-center sm" role="alert">--}}
{{--                    {{Session::get('sm')}}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        @if($errors)--}}
{{--            @foreach ($errors->all() as $message)--}}
{{--                <div class="container">--}}
{{--                    <div class="alert alert-danger text-center" role="alert">--}}
{{--                        {{$message}}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}

        <!-- </div> -->
<!-- </div> -->
</div>
<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
<script src="{{asset('js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>
<script src="{{asset('js/paper-dashboard.js.map')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>


</html>
