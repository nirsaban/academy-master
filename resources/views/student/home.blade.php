@extends('masters.studentMaster')
@section('content')

    <!-- <link rel="stylesheet" href="{{ URL::asset('css/homeEmployerTest.css') }}"> -->

    <div class="titre-content" style="margin-top: 150px">
        <div class="emp-header">
            <h1>Welcome Back {{Auth::user()->name}}</h1>
            <h2> {{$title}}</h2>
        </div>
    </div>
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

