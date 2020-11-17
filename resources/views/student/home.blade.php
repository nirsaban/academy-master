@extends('masters.studentMaster')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/css/uikit.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/css/components/sticky.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/js/components/grid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/js/components/sticky.min.js"></script>
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/homeEmployerTest.css') }}"> -->

    @if(session()->has('message'))
    <div class="text-center">
        <div class="blur-out-expand-fwd">
            {{ session()->get('message') }}
        </div>
    </div>
@endif
@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="text-center">
            <div class="  bounce-top ">
                {{$error}}
            </div>
        </div>
    @endforeach
@endif
    <div class="content">
        {{-- <nav data-uk-sticky id="items" class="uk-navbar">
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
                        <li data-uk-sort="numbers"><a href="#">Salary<i class="uk-icon-sort-alpha-asc"></i></a></li>
                        <li data-uk-sort="numbers:desc"><a href="#">Salary <i class="uk-icon-sort-alpha-desc"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav> --}}

    <div class="titre-content" style="margin-top: 150px">
        <div class="emp-header">
            <h1>Welcome Back {{Auth::user()->name}}</h1>

        </div>
    </div>
        <div class="row d-flex justify-content-center">
          @foreach($allJobs as $job)
          <div class="col-md-3">
            <div class="card card-user">
              <div class="image">
                <img src="{{asset('/images/Job-Hunting-Illustration.jpg')}}" alt="...">
              </div>

              <div class="card-body" style="margin-top: 80px">
                <div class="author">
                  <a href="#">
                  <h5 class="title">{{$job['title']}}</h5>
                  </a>
                  <a href="#">
                    <h5 class="title">{{$job['company']}}</h5>
                  </a>
                </div>
                <p class="description">
                  <i class="nc-icon nc-briefcase-24"></i>&nbsp;&nbsp;&nbsp;
                  <span>{{$job['description']}}</span>
                </p>
                @if(isset($userCategory) && $userCategory != null)
                <p class="description">
                <i class="nc-icon nc-caps-small"></i>&nbsp;&nbsp;&nbsp;
                    <span>
                    <!-- <ol> -->
                        @foreach(json_decode($job->requirements) as $require)
                        {{$require}}
                        @endforeach
                    <!-- </ol> -->
                    </span>
                </p>
                <p class="description">
                <i class="nc-icon nc-pin-3"></i>&nbsp;&nbsp;&nbsp;
                    <span>{{$job['location']}}</span>
                </p>

                <p class="description">
                <i class="material-icons circle grey">attach_money</i>&nbsp;
                    <span>{{$job['salary']}}</span>
                </p>
                <p class="description">
                <i class="nc-icon nc-single-02"></i>&nbsp;&nbsp;&nbsp;
                    <span>{{$job['user']['name']}}</span>
                </p>
                @endif
              </div>
              <div class="card-footer">

                <hr>
                  <div class="button-container">
                    <div class="row">
                      <div class="col-lg-4 col-md-6 col-6 ml-auto">
                        <a class="col l10 s10 center" style="font-family:Comic Sans MS, cursive, sans-serif !important">#{{$job['course']['name']}}#{{$job['category']['cat_name']}}</a>
                      </div>
                      <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                        @if(isset($userCategory) && $userCategory != null)
                        <a href="#" class="btn btn-floating pulse " style="background-color: #007bff !important">
                            <i class="material-icons   col  s2 large text-red center"
                             onclick="addLikeTojob(0,'{{$job->id}}','{{Auth::id()}}')">thumb_up</i>
                        </a>
                        @else
                        <a href="#" class="btn btn-floating pulse " style="background-color: #007bff !important">
                            <i class="material-icons   col  s2 large text-red center"
                             onclick="checkCategory('{{Auth::id()}}')">visibility</i>
                        </a>
                         @endif
                      </div>
                    </div>
                </div>

            </div>
        </div>
      </div>
      @endforeach
      </div>
    </div>
<script>
    function deleteJob(data) {
        const url = data.href

        swal.fire({
            title: 'Are you sure delete this job?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                axios({
                    method:'get',
                    url:url,
                }).then(({data})=>{
                    swal({title: 'Shortlisted!',text: `${data}!`,icon: 'success'})
                    location.reload()
                });

            }else{
                swal("Cancelled", "You dont deleted any post job:)", "error");
            }
        });
    }
</script>
@endsection

