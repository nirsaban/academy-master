@extends('masters.studentMaster')
@section('content')



<div class="content">
   <div class="row d-flex justify-content-center">
      <div class="col-md-8">
         <div class="card card-user">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <div class="btn btn-info" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-gear fa-lg"></i>
                            <span>Settings</span>
                        </div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <div class="btn btn-danger reset" onclick="resetProfile({{Auth::id()}})">
                            <div class="reset2" ></div>
                            <i class="fa fa-refresh fa-lg"></i>
                            <span>Reset</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                    <form action="{{ route('image.upload.post') }}"  method="POST" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="id" value="{{Auth::id()}}">
                        <div class="row text-center">

                            <div class="col-md-12">
                                @if(isset($profile[0]['image']))
                                <img src="{{asset('images/_'.Auth::id().'/'.$profile[0]['image'])}}" class="profile_image" style="width: 200px; margin-bottom: 20px"/>
                                @else
                                <img src="{{asset('images/avatar.jpg')}}"  style="width: 200px; margin-bottom: 20px" alt="" class="profile_image">
                                @endif
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" />
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning btn-round p-2 m-0">Add Photo</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="col-sm-12 col-md-9">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <h3 class="card-title text-capitalize text-bold" >{{Auth::user()->name .' '}}Profile</h3>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="text-dark  text-underline m-0">My Category</h5>
                                    <div class="btn btn-info btn-round ml-2" data-toggle="modal" data-target=".bs-example-modal-new">
                                        <i class="fa fa-edit fa-lg" ></i>
                                    </div>
                                </div>
                                <div class="pr-3 text-justify">
                                    <div class="category_name text-capitalize">{{$profile[0]['category']['cat_name'] ?? 'Your category'}}</div>
                                    @include('student.partials.category')
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="d-flex align-items-center  justify-content-between">
                                    <h5 class="text-dark  text-underline m-0">About me</h5>
                                    <div class="btn btn-info btn-round ml-2" data-toggle="modal" data-target="#aboutMeModal">
                                        <i class="fa fa-edit fa-lg"></i>
                                    </div>
                                </div>
                                <div class="pr-3 text-justify">
                                    <div class="about_me_content aboutMe text-capitalize">
                                        {{$profile[0]['about_me'] ?? ''}}
                                    </div>
                                    @include('student.partials.about_me')
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-3">
                                <div class="d-flex align-items-center  justify-content-between">
                                    <h5 class="text-dark  text-underline m-0">My Educations</h5>
                                    <div class="btn btn-info btn-round ml-2"  data-toggle="modal" data-target="#myModalEducation">
                                        <i class="fa fa-edit fa-lg"></i>
                                    </div>
                                </div>
                                <div class="pr-3 text-justify">
                                    <div class="education_content  " id="pEdu" >
                                        <?php $count = 0 ?>
                                        @if(isset($profile[0]['education']))
                                        @foreach(json_decode($profile[0]['education']) as $edu)
                                        <?php $count++ ; ?>
                                        <li class="tags text-capitalize">{{$edu}}</li>
                                        @endforeach
                                        @endif
                                    </div>
                                    @include('student.partials.educations')
                                    </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-3">
                                <div class="d-flex align-items-center  justify-content-between">
                                    <h5 class="text-dark  text-underline m-0">My Skills</h5>
                                    <div class="btn btn-info btn-round ml-2" data-toggle="modal" data-target="#myModalSkills">
                                        <i class="fa fa-edit fa-lg" ></i>
                                    </div>
                                </div>
                                <div class="pr-3 text-justify">
                                    <div class="my_skills_content" id= "spansSkills">
                                        @if(isset($profile[0]['my_skills']))
                                        @foreach(json_decode($profile[0]['my_skills']) as $skill)
                                        @if(strlen($skill) > 2)
                                        <li class="tags text-catpitalize">{{$skill}}</li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                    @include('student.partials.skills')
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-3">
                                <div class="d-flex align-items-center  justify-content-between">
                                    <h5 class="text-dark  text-underline m-0">Build your portfolio</h5>
                                    <div class="btn btn-info btn-round ml-2" data-toggle="modal" onclick="window.location='{{url('/BuildPortFolio/'.Auth::id())}}'">
                                        <i class="fa fa-edit fa-lg"></i>
                                    </div>
                                </div>
                                <div class="pr-3 text-justify">
                                    <div class="links_content"  id="pLink">
                                        @if(isset($profile[0]['links']))
                                        @foreach(json_decode($profile[0]['links'])  as $link)
                                        @if(strlen($link) > 2)
                                        <li>
                                            <a class="linksA linkStyle cursor-pointer" onclick="window.location.href = 'https://{{$link}}'">{{$link}}</a><br>
                                        </li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                    @include('student.partials.links')
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-3">
                                <div class="d-flex align-items-center  justify-content-between">
                                    <h5 class="text-dark  text-underline m-0">My Work Experience</h5>
                                    <div class="btn btn-info btn-round ml-2"  data-toggle="modal" data-target="#myModalWorks">
                                        <i class="fa fa-edit fa-lg"></i>
                                    </div>
                                </div>
                                <div class="pr-3 text-justify">
                                    <div class="work_experience_content" id="pEx">
                                        <?php $count = 0 ?>
                                        @if(isset($profile[0]['work_experience']))
                                        @foreach(json_decode($profile[0]['work_experience']) as $work)
                                        <?php $count++ ; ?>
                                        @if(strlen($work) > 2)
                                        <li class="tags text-capitalize">{{$work}}</li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <style>
                .parent-percent{
                    display: flex;
                    flex-direction: row;
                    /* padding: 40px; */
                    padding: 10px;
                    justify-content: center;
                }
                .child-percent{
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    gap: 5px;
                    /* padding: 40px; */
                    box-shadow: 0px 0px 5px #888;
                    padding: 5px;
                    border-radius: 17px;
                    flex-wrap: wrap;
                    justify-content: center;
                }
                .card-user .image {
                    height: auto !important;
                }
                .card .image {
                    height: auto !important;
                }
                .percent-item{
                    padding: 5px;
                    border-radius: 10px;
                }
               </style>
               <div class="row parent-percent">
                    <div class="compliteProf child-percent">
                        <div data-color = "rgba(255, 0, 0, 0.2)" class=" percent-item category_id item">Category</div>
                        <div data-color = "rgba(255, 0, 0, 0.4)" class=" percent-item about_me item">about</div>
                        <div data-color = "rgba(255, 0, 0, 0.5)" class=" percent-item education item">education</div>
                        <div data-color = "rgba(255, 0, 0, 0.6)" class=" percent-item my_skills item">skills</div>
                        <div data-color = "rgba(255, 0, 0, 0.7)" class=" percent-item links item">links</div>
                        <div data-color = "rgba(255, 0, 0, 0.8)" class=" percent-item work_experience item" >works</div>
                        <div  data-color = "rgba(255, 0, 0, 0.9)" class=" percent-item image item">image</div>
                        <div style="font-size: 1.7rem"  class=" percent-item present item">0%</div>
                    </div>
               </div>
               <!-- <div class="row">
                  <div class="update ml-auto mr-auto">
                     <div class="compliteProf">
                        <div style="font-size: 1.7rem"  class="present item">0%</div>
                     </div>
                  </div>
               </div> -->
            </div>
            <!-- <button class="btn btn-primary btn-round" href="#aboutModal" data-toggle="modal" data-target="#myModalLabel">Show</button> -->
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>

</div>
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
       <div class="modal-content">
       <div>
             <ul class="nav nav-tabs" id="myTab" role="tablist">
             <li class="nav-item" role="presentation">
                 <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab01" role="tab" aria-controls="home" aria-selected="true">My Profile</a>
             </li>
             <li class="nav-item" role="presentation">
                 <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab02" role="tab" aria-controls="profile" aria-selected="false">Change Password</a>
             </li>
             <li class="nav-item" role="presentation">
                 <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab03" role="tab" aria-controls="contact" aria-selected="false">Category Info</a>
             </li>
             <li class="nav-item" role="presentation">
                 <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab04" role="tab" aria-controls="contact" aria-selected="false">Course Info</a>
             </li>
             </ul>
             <div class="tab-content" id="myTabContent">
             <div class="tab-pane fade show active" id="tab01" role="tabpanel" aria-labelledby="my-profile">
                 <div class="px-3">
                 <div class="d-flex align-items-center mt-4">
                 <h5 class="text-dark text-capitalize m-0"><a href="#" class="text-dark">viewed my profile -</a> </h5>
                 <span class="text-secondary ml-3">{{$watches}}  job post</span>
                 </div>
                 <h5 class="pb-4"><a href="#" class="text-dark">Status</a> <span class="text-secondary">- @if(isset($profile[0]['confirm']))
                     @if($profile[0]['confirm'] == '0')
                     <span style="color:red"><i class="fas fa-clock fa-spin mr-3"></i>Waiting for confirm</span>
                     @else
                     <span  style="color:green"><i class="fas fa-check mr-3"></i>confirm</span>
                     @endif
                     @endif</span>
                 </h5>
             </div>
             </div>
             <div class="tab-pane fade" id="tab02" role="tabpanel" aria-labelledby="change-password-tab">
                 <div class="bg-light">
                   <h5 class="text-center mb-4 mt-0 pt-4">Fill the input</h5>
                   <div class="card">
                      <div class="card-body">
                         @if(session()->has('message'))
                         <script>
                            $(window).load(function() {
                                $('#myModal').modal('show');
                            });
                         </script>
                         <div class="blur-out-expand-fwd text-center">
                            <small class="text-center font-weight-bold" style="font-size: 1.2rem">{{ session()->get('message') }}</small>
                         </div>
                         @endif
                         <form method="POST" action="{{ route('change.password') }}">
                            @csrf
                            @if($errors->any())
                            <script>
                               $(window).load(function() {
                                   $('#myModal').modal('show');
                               });
                            </script>
                            @foreach ($errors->all() as $error)
                            <p class="text-danger"style="font-size: 1.2rem">{{ $error }}</p>
                            @endforeach
                            @endif
                            <div class="form-group row">
                               <label for="password" class="col-md-3 col-form-label text-md-center"><span class="fa-lg text-dark">Current: </span></label>
                               <div class="col-md-9">
                                  <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password" >
                                  <span style="font-size: 1.2rem;color: red" id="currentPass"></span>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label for="password" class="col-md-3 col-form-label text-sm-center"><span class="fa-lg text-dark">New: </span></label>
                               <div class="col-md-9">
                                  <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" >
                               </div>
                            </div>
                            <div class="form-group row">
                               <label for="password" class="col-md-3 col-form-label text-md-center"><span class="fa-lg text-dark">Repeat:</span></label>
                               <div class="col-md-9">
                                  <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" onkeyup="checkPassword(this)" autocomplete="current-password">
                               </div>
                            </div>
                            <div class="form-group row mb-0">
                               <div class="col-md-12 text-right">
                                  <button type="submit" class="btn btn-primary">
                                  Update Password
                                  </button>
                               </div>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
             <div class="tab-pane fade" id="tab03" role="tabpanel" aria-labelledby="category-info-tab">
                 <div class="bg-light">
                   <h5 class="text-center mb-4 mt-0 pt-4 text-capitalize">Info about {{$profile[0]['category']['cat_name'] ?? 'you must choose category'}}</h5>
                </div>
                <div class="px-3">
                   <div class="border border-1 box p-2 ">
                      <p class="text-muted mb-1">Students : <strong>{{$StudentCategory}}</strong></p>
                   </div>
                   <div class="border border-1 box p-2 mt-2 ">
                      <p class="text-muted mb-1 text-sm-left">Jobs : <strong>{{$allJobCat}}</strong></p>
                   </div>
                </div>
             </div>
             <div class="tab-pane fade" id="tab04" role="tabpanel" aria-labelledby="course-info-tab">
                 <div class="bg-light">
                   <h5 class="text-center mb-4 mt-0 pt-4 text-capitalize">Info about {{$courseName}}</h5>
                </div>
                <div class="px-3">
                   <div class="border border-1 box p-2">
                      <p class="text-muted mb-1">Students : <strong>{{$studentCourse}}</strong></p>
                   </div>
                   <div class="border border-1 box p-2 mt-2">
                      <p class="text-muted mb-1 text-sm-left">Jobs : <strong>{{$jobsCourse}}</strong></p>
                   </div>
                </div>
             </div>
             </div>
         </div>
         <div class="line"></div>
          <div class="modal-footer d-flex flex-column justify-content-center border-0">
             <p class="text-muted">{{Auth::user()->name}} profile</p>
          </div>
       </div>


       </div>
    </div>
</div>
@if(isset($present))
<script>
   const PRESENT =  <?php print_r(json_encode($present));?>
</script>
@endif
@include('student.partials.works')
@endsection
