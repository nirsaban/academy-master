@extends('masters.employerMaster')
@section('content')

    <!-- <link rel="stylesheet" href="{{ URL::asset('css/studentByCategory.css') }}"> -->

    <div class="d-flex justify-content-center" style="margin-top: 150px">
        <h2> Did you like my profile? Mark like And maybe we'll meet soon<span class="LikeIcon"> <i class="far fa-thumbs-up fa-1x" style="color:#1b4b72;" onclick="addLikeToStudent('employer','{{$id}}','{{$job_id}}')"></i></span>
    </div>

    <div class="content">




        <div class="row d-flex justify-content-center">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{asset('/images/damir-bosnjak.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    @if(isset($allData[0]->image))
                        <img src="{{asset('images/_'.$id.'/'.$allData[0]->image)}}" class="avatar border-gray"/>
                    @else
                        <img src="{{asset('images/avatar.jpg')}}"  alt="" class="avatar border-gray">
                    @endif
                    <form  action="{{ route('image.upload.post') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                    </form>
                    <h3 class="title">{{$name}} Profile</h3>
                    <h5 class="title"> {{$cat_name}}</h5>
                  </a>

                  <p class="description" style="font-size: 16px; font-weight: bold">
                  About me
                  </p>
                </div>
                <p class="description text-center">
                @if(isset($allData[0]->about_me))
                    {{$allData[0]->about_me}}
                @endif
                </p>
              </div>
            </div>
            @if($grade[0]['grade'] != null)
            <div class="card ">
              <div class="card-header d-flex justify-content-center gradeBox">
                <h4 class="card-title">
                    @if($grade[0]['grade']['outstanding'] == 1 )
                    <i class="fas fa-medal text-success fa-2x"></i>
                    @endif</h4>
                <h4 class="card-text good-review-score float-left "><div class="grade"> GPA : {{$grade[0]['grade']['grade'] / 10}}</div></h4>
              </div>
              <div class="card-body ">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row ">
                      <div class="col">
                        <div class="author  gradeBox">

                            <div class="evalution">
                                <h6 class="card-title">	Lecturer Evaluation</h6>
                                <p class="card-text tt text-wrap">{{$grade[0]['grade']['valuation']}}</p>
                            </div>
                      </div>
                    </div>
                  </li>
                  <li>
                </ul>
              </div>
            </div>
            @endif



            <div class="card">
              <div class="card-header d-flex justify-content-center">
                <h4 class="card-title">My Skills</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col">
                        <div class="author">
                        <h5 class="title">
                        @if(isset($allData[0]->my_skills))
                            @foreach(json_decode($allData[0]->my_skills) as $skill)
                                @if(strlen($skill) > 2)
                                    <span class="tags">{{$skill}}</span>
                                @endif
                            @endforeach
                        @endif
                        </h5>

                      </div>
                    </div>
                  </li>
                  <li>
                </ul>
              </div>
            </div>



          </div>

          <div class="col-md-4">
          <div class="card">
              <div class="card-header d-flex justify-content-center">
                <h4 class="card-title">My Work experience</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col">
                        <div class="author">
                        <h5 class="title">
                        <?php $count = 0 ?>
                        @if(isset($allData[0]->work_experience))
                            @foreach(json_decode($allData[0]->work_experience) as $work)
                                <?php $count++ ; ?>
                                @if(strlen($work->theJob) > 2)
                                <li class="tags text-capitalize">{{$work->theJob}} ,({{$work->startYear}}-{{$work->endYear}})</li>
                                @endif

                            @endforeach
                        @endif
                        </h5>
                      </div>
                    </div>
                  </li>
                  <li>
                </ul>
              </div>
            </div>
            <div class="card">
              <div class="card-header d-flex justify-content-center">
                <h4 class="card-title">My Education</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col">
                        <div class="author">
                        <h5 class="title">
                        <?php $count = 0 ?>
                        @if(isset($allData[0]->education))
                            @foreach(json_decode($allData[0]->education) as $edu)
                                <?php $count++ ; ?>
                                @if(strlen($edu->FieldStudy) > 2)
                                <li class="tags text-capitalize">{{$edu->FieldStudy}} ,({{$edu->startYear}}-{{$edu->endYear}})</li>
                                @endif
                            @endforeach
                        @endif
                        </h5>

                      </div>
                    </div>
                  </li>
                  <li>
                </ul>
              </div>
            </div>


            <div class="card">
              <div class="card-header d-flex justify-content-center">
                <h4 class="card-title">My portFolio</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col">
                        <div class="author">
                        <h5 class="title">
                        @if(isset($allData[0]->links))
                        <a class="linksA linkStyle" href="PortFolioStudent/{{$id}}">Go To My PortFolio</a><br>
                        @endif
                        </h5>

                      </div>
                    </div>
                  </li>
                  <li>
                </ul>
              </div>
            </div>
          </div>

        </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
        <script src="{{asset('js/employer.js')}}"></script>
@endsection
