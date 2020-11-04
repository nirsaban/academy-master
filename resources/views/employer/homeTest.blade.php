@extends('masters.employerMaster')
@section('content')

    <!-- <link rel="stylesheet" href="{{ URL::asset('css/homeEmployerTest.css') }}"> -->
    <div class="titre-content" style="margin-top: 100px">
        <div class="emp-header">
            <h1>Welcome back {{Auth::user()->name}}</h1>
            <h2> {{$title}}</h2>
        </div>
    </div>
    @if(session()->has('message'))
    <script>Swal.fire(" {{ session()->get('message') }}", "great :)", "success")</script>
        {{-- <div class="text-center"; style="margin-top:5em">
            <div class="blur-out-expand-fwd">
                {{ session()->get('message') }}
            </div>
        </div> --}}
    @endif
    @if($errors->any())
        @foreach ($errors->all() as $error)
        <script>Swal.fire(" {{$error}}", "sorry :)", "error")</script>
        @endforeach
    @endif

    <div class="content">
        <div class="row d-flex justify-content-center " style="margin-top:4rem">
        @foreach($jobs as $job)
          <div class="col-md-3">
            <div class="card card-user">
              <div class="image">
                <img src="{{asset('/images/Job-Hunting-Illustration.jpg')}}" alt="...">
              </div>
              <div class="card-body" style="padding-top: 100px">
                <div class="author">
                  <a href="#">
                    <h5 class="title">{{$job['category']['cat_name']}}</h5>
                  </a>
                </div>
                <p class="description text-center">
                    <i class="nc-icon nc-caps-small" style="font-weight: bold"></i>&nbsp;&nbsp;&nbsp;
                    <span>{{$job['title']}}</span>
                </p>
                <p class="description text-center">
                    <i class="fas fa-info" style="font-weight: bold"></i>&nbsp;&nbsp;&nbsp;
                    <span>{{$job['description']}}</span>
                </p>
                <p class="description text-center">
                    <i class="nc-icon nc-briefcase-24" style="font-weight: bold"></i>&nbsp;&nbsp;&nbsp;
                    <span>{{$job['company']}}</span>
                </p>
                <p class="description text-center">
                    <i class="fas fa-hand-holding-usd" style="font-weight: bold"></i>&nbsp;&nbsp;&nbsp;
                    <span>{{$job['salary']}}</span>
                </p>
                <p class="description text-center">
                    <i class="nc-icon nc-pin-3" style="font-weight: bold"></i>&nbsp;&nbsp;&nbsp;
                    <span>{{$job['location']}}</span>
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                    <a href ="editJob/{{$job['id']}}/course/{{$job['course']['id']}}" id="left-panel-link" class="nc-icon nc-ruler-pencil"></a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                    <a onclick="clickForm()" class="nc-icon nc-single-02">
                        <form action="{{url('studentCategory')}}" class="nc-icon nc-single-02" method="POST" style="display: none">
                        @csrf
                        <input type="hidden"  name="job_id" value="{{$job['id']}}">
                        <input type="hidden" name="category_id" value="{{$job['category']['id']}}">
                        <input id="form" type="submit" class="btn" name="submit"  id="left-panel-link" value="All students">
                        </form>
                    </a>
                    </div>
                    <div class="col-lg-3 mr-auto">
                    <a href="job/delete/{{$job['id']}}" data-toggle="modal" data-target="#exampleModal1" id="left-panel-link" onclick="deleteJob(this)" type="button" class="nc-icon nc-simple-remove"></a>
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
    function clickForm(){
        let form = document.getElementById("form");
        console.log(form)
        form.click();
    }
    function deleteJob(data) {
        const url = data.href

        swal.fire({
            title: 'Are you sure delete this job?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, i want to delte this job !'
        }).then((result) => {
            if (result.isConfirmed) {
                axios({
                    method:'get',
                    url:url,
                }).then(({data})=>{
                    Swal.fire({title: 'deleted!',text: `${data}!`,icon: 'success'})
                    location.reload()
                });

            }else{
                swal.fire("Cancelled", "You dont deleted any post job:)", "error");
            }
        });
    }

</script>
@endsection
