@extends('masters.employerMaster')
@section('content')
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/homeEmployerTest.css') }}"> -->
    <div class="titre-content" style="margin-top: 150px">
        <div class="d-flex justify-content-center">
            <h2> {{$title}}</h2>
        </div>
    </div>
    <div class="content">

        <div class="row d-flex justify-content-center">
        <div class="col-md-4">
    @foreach($students as $student)

            <div class="card card-user">
              <div class="image">
                <img src="{{asset('images/damir-bosnjak.jpg')}}" alt="...">
              </div>
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

        @endforeach

    </div>
    <!-- <div class="titre-content">
        <div>
            <h1> {{$title}}</h1>
        </div>
    </div>
        <header class="headerPage">
            <h2 class="titlePage">{{$title}}</h2>
        </header>
    <div class="studentsContainer">
@foreach($students as $student)

    <div class="card">
        <header>
            <h1>{{$student->user['name']}}</h1>
            <h2>{{$student->category['cat_name']}}</h2>
            <img  @if(isset($student->image)) src="{{asset('images/_'.$student->user['id'].'/'.$student->image)}}" @else src="{{asset('images/avatar.jpg')}}"   @endif class="avatar" />
        </header>
        <article>
            <p>{{$student->about_me}}</p>
        </article>
        <footer>
            <p class="cf">
                <form action="{{url('profileStudent')}}" method="POST">
                @csrf
                  <input type="hidden"  name="id" value="{{$student->user['id']}}">
                <input type="hidden" name="job_id" value="{{$job_id}}">
                <button type="submit" class="align-left share" ><i class="fa fa-fw fa-share"></i> Go to My profile </button>
                </form>
{{--                <a class="align-left share" href="{{url('profileStudent/'.$student->user['id'])}}"><i class="fa fa-fw fa-share"></i> Go to My profile</a>--}}
            </p>
        </footer>
    </div>
@endforeach
    </div> -->
@endsection
