<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnClickJob</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>


<body>
<section class="top-nav">
    <div>
      OnClickJOb
    </div>
    <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
    </label>
    <ul class="menu">
        <li>
            <a class="nav-link" href="{{url('/student')}}">
                Home
            </a>
        </li>
        <li>
            <a class="nav-link" onclick="window.location='{{url('profile').'/'.Auth::id()}}'">
                Profile
            </a>
        </li>
        <li>
            <a class="nav-link" onclick="window.location='{{url('/formatCv')}}'">
                Cv format
            </a>
        </li>
        <li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span style="padding: 0" class="badge badge-info" id="countMessage"></span><i class="fas fa-comments"></i>
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg-left" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','old')">
                    old message
                </a>
                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','profile')">
                    messages about profile
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
</section>
<input type="hidden" id="idToMessages" value="{{Auth::id()}}">
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}">
@include('student.partials.modal')
@yield('content')

<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/messages.js')}}"></script>
<script src="{{asset('js/student.js')}}"></script>
<script src="{{asset('js/profile.js')}}"></script>
<script src="{{asset('js/profileTest.js')}}"></script>
</body>
</html>
