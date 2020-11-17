@extends('masters.employerMaster')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/css/uikit.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/css/components/sticky.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/js/components/grid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/js/components/sticky.min.js"></script>


    <div class="content">
        <nav data-uk-sticky id="items" class="uk-navbar">
            <label class="uk-navbar-content uk-hidden-small">Filter:</label>
            <ul class="uk-navbar-nav uk-hidden-small">
                <li data-uk-filter="" class="uk-active"><a href="#">ALL</a></li>
                <li data-uk-filter="Out"><a href="#">Out Standing</a></li>
                <li data-uk-filter="Porfolio"><a href="#">Have Porfolio</a></li>
            </ul>
            <label class="uk-navbar-content uk-hidden-small">Sort:</label>
            <ul class="uk-navbar-nav uk-hidden-small">
                <li data-uk-sort="numbers"><a href="#">Personality Match <i class="uk-icon-sort-numeric-asc"></i></a></li>
                <li data-uk-sort="numbers:desc"><a href="#">Personality Match <i class="uk-icon-sort-numeric-desc"></i></a></li>
                <li data-uk-sort="numbers"><a href="#">Grade<i class="uk-icon-sort-alpha-asc"></i></a></li>
                <li data-uk-sort="numbers:desc"><a href="#">Grade<i class="uk-icon-sort-alpha-desc"></i></a></li>
            </ul>
            <div data-uk-dropdown="{mode:'click'}">
                <a href="#" class="uk-navbar-toggle uk-visible-small"></a>
                <div class="uk-dropdown uk-dropdown-navbar">
                    <ul class="uk-nav uk-nav-navbar">
                        <li class="uk-nav-header">Filter:</li>
                        <li data-uk-filter="" class="uk-active"><a href="#">ALL</a></li>
                        <li data-uk-filter="Out"><a href="#">Out Standing</a></li>
                        <li data-uk-filter="Porfolio"><a href="#">Have Porfolio</a></li>

                        <li class="uk-nav-divider"></li>
                    </ul>
                    <ul class="uk-nav uk-nav-navbar">
                        <li class="uk-nav-header">Sort:</li>
                        <li data-uk-sort="numbers"><a href="#">Personality Match <i class="uk-icon-sort-numeric-asc"></i></a></li>
                        <li data-uk-sort="numbers:desc"><a href="#">Personality Match<i class="uk-icon-sort-numeric-desc"></i></a></li>
                        <li data-uk-sort="numbers"><a href="#">Grade<i class="uk-icon-sort-alpha-asc"></i></a></li>
                        <li data-uk-sort="numbers:desc"><a href="#">Grade <i class="uk-icon-sort-alpha-desc"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="titre-content" style="margin-top: 150px">
            <div class="d-flex justify-content-center">
                <h2> {{$title}}</h2>
            </div>
        </div>

            <div class="studentsContainer row d-flex justify-content-center" data-uk-grid="{gutter: 20, controls: '#items', duration: 500}">
        @foreach($students as $key => $student)
           <div @if($student['outstanding'] == 1) data-uk-filter="Out" @endif @if($student['portfolio']) data-uk-filter="Porfolio" @endif   data-numbers="{{$student->present}}" data-numbers="{{$student['grade']}}"  class="col-md-2">
             <div class="card card-user">
              <div class="image">
                <img src="{{asset('images/damir-bosnjak.jpg')}}" alt="...">

              </div>
              <div class="presentMatch"><div class="present">{{$student->present}}%</div></div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" @if(isset($student->image)) src="{{asset('images/_'.$student->user['id'].'/'.$student->image)}}" @else src="{{asset('images/avatar.jpg')}}"   @endif class="avatar" >
                    <h5 class="title">{{$student->user['name']}}</h5>
                  </a>
                  <p class="description">
                  {{$student->category['cat_name']}}
                  </p>
                </div>
                <p class="description text-center">
                {{$student->about_me}}
                </p>
                <form action="{{url('profileStudent')}}" method="POST">
                    @csrf
                    <input type="hidden"  name="id" value="{{$student->user['id']}}">
                    <input type="hidden" name="job_id" value="{{$job_id}}">
                    <p class="description d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-round">Go to my profile</button>

                    </p>
                </form>

              </div>

            </div>
        </div>
        @endforeach

    </div>
        </div>
    </div>
@endsection
