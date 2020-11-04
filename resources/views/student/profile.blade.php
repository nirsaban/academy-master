@extends('masters.studentMaster')
@section('content')

<div class="content">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title" >{{ __('Add cv format') }}</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('upload.cvToCheck') }}" enctype="multipart/form-data" >
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" id="file" name="cv" class="custom-file-input" />
                                                @error('cv')
                                                <br>
                                                <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{ $message }}</div>
                                                @enderror
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary btn-round">Upload Now</button>
                                    </div>
                                    @if($errors->any() && $errors->first() != 'you must choose Pdf file before sending' &&  $errors->first() != 'you must choose Course from dropdown before sending')
                                        <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{$errors->first()}}</div>
                                    @endif
                                </div>
                            </form>
                            <!-- <button class="btn btn-primary btn-round" href="#aboutModal" data-toggle="modal" data-target="#myModalLabel">Show</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

<?php echo 'here';die;?>
    <link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
    <input type="hidden" id="idUser" value="{{Auth::id()}}" >
    

    <div class="container">
        @if(isset($allData[0]))
        <div class="reset" onclick="resetProfile({{Auth::id()}})">
            reset
            <div class="reset2" ></div>
        </div>
        @endif
        <div class="main_title tracking-in-expand">{{$name}} Profile</div>
        <div class="image_area ">
            @if(isset($allData[0]->image))
                <img src="{{asset('images/_'.Auth::id().'/'.$allData[0]->image)}}" class="profile_image"/>
            @else
            <img src="{{asset('images/avatar.jpg')}}"  alt="" class="profile_image">
            @endif
            <form  action="{{ route('image.upload.post') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{Auth::id()}}">
                    <div class="custom-file" style="font-size: .7rem">
                      <input  type="file" name="image" class="custom-file-input" id="inputGroupFile04">
                      <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                      <div class="btn-change"><button style="color:red" class="button-change third ">add photo</button> </div>
                    </div>
        </form>
        </div>

        <div class="category_area item">
            <div class="change_category">
           <i class="fas fa-edit" data-col="category_id" onclick="edit(this.dataset)" id="edit"></i><i data-id="{{Auth::id()}}" data-col ="category_id" class=" fas fa-check-square" onclick= "update(this.dataset)" id="update"></i>
           <div class="default">my category</div>
           <div class="category_name ">{{$cat_name ?? 'Your category'}}</div>
            </div>
                <select name="category_id" id="" class="cat form-control col-6 form-control-sm"  style="display:none;font-size: 1.7rem">
                    <option value="">choose your category</option>
                       @foreach($categories as $category)
                          <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                  @endforeach
                  </select>

        </div>
        <div class="about_me_area item" id="aboutParent">
            <div class="change_about_me">
                <i class="fas fa-edit "  id="editAbout" data-col="about_me" onclick="edit(this.dataset)" id="edit"></i><i data-id="{{Auth::id()}}" data-col ="about_me" class=" fas fa-check-square updateAbout" onclick= "update(this.dataset)" id="update"></i><br>
                <div class="default">
                    about me
                </div>
            </div>
            <div class="about_me_content aboutMe">
                @if(isset($allData[0]->about_me))
                {{$allData[0]->about_me}}
                @endif
            </div>
        </div>
        <div class="education_area item educationParent">
            <div class="change_education">
            <i data-col="education" class="fas fa-edit"  onclick="edit(this.dataset)" id="editEd"></i><i  data-id="<?=Auth::id()?>" data-col ="education" class=" fas fa-check-square updateEd" onclick="update(this.dataset)"></i><br>
            </div>
            <div class="default">
                my educations
            </div>
            <div class="education_content  " id="pEdu" >
                    <?php $count = 0 ?>
                    @if(isset($allData[0]->education))
                    @foreach(json_decode($allData[0]->education) as $edu)
                        <?php $count++ ; ?>
                        @if(strlen($edu) > 2)
                            <span>{{$count .'. '}}</span><p style="display: inline-block" class="h6 pEdu ">{{$edu}}</p><br>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="my_skills_area item skillsParent">
            <div class="change_my_skills">
                <i data-col="my_skills" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editSk"></i><i  data-id="<?=Auth::id()?>" data-col ="my_skills" class=" fas fa-check-square updateSk" onclick="update(this.dataset)"></i><br>
            </div>
            <div class="default">
                my skills
            </div>
            <div class="my_skills_content" id= "spansSkills">
                @if(isset($allData[0]->my_skills))
                @foreach(json_decode($allData[0]->my_skills) as $skill)
                @if(strlen($skill) > 2)
                    <span class="tags">{{$skill}}</span>
                @endif
         @endforeach
         @endif
            </div>
        </div>
        <div class="links_area item linksParent">
            <div class="change_links">
          <i data-col="links" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editLi"></i><i  data-id="<?=Auth::id()?>" data-col ="links" class=" fas fa-check-square updateLi" onclick="update(this.dataset)"></i><br>
        </div>
        <div class="default">
           My best project links
        </div>
            <div class="links_content"  id="pLink">
                @if(isset($allData[0]->links))
                @foreach(json_decode($allData[0]->links)  as $link)
                    @if(strlen($link) > 7)
                        <a class="linksA linkStyle" href="www.{{$link}}">{{$link}}</a><br>
                    @endif
                @endforeach
                    @endif
            </div>
        </div>
        <div class="work_experience_area ExperienceParent item">
            <div class="change_work_experience">
          <i data-col="work_experience" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editEx"></i><i  data-id="<?=Auth::id()?>" data-col ="work_experience" class=" fas fa-check-square updateEx" onclick="update(this.dataset)"></i><br>

        </div>
        <div class="default">
            My Work experience
         </div>
            <div class="work_experience_content" id="pEx">
                <?php $count = 0 ?>
                @if(isset($allData[0]->work_experience))
            @foreach(json_decode($allData[0]->work_experience) as $work)
                <?php $count++ ; ?>
                @if(strlen($work) > 2)
                    <span>{{$count .'. '}}</span><p style="display: inline-block" class="h6 pEx">{{$work}}</p><br>
                @endif
            @endforeach
          @endif
            </div>
        </div>
        <div class="compliteProf">
            <div data-color = "rgba(255, 0, 0, 0.2)" class="category_id item">Category</div>
            <div data-color = "rgba(255, 0, 0, 0.4)" class="about_me item">about</div>
            <div data-color = "rgba(255, 0, 0, 0.5)" class="education item">education</div>
            <div data-color = "rgba(255, 0, 0, 0.6)" class="my_skills item">skills</div>
            <div data-color = "rgba(255, 0, 0, 0.7)" class="links item">links</div>
            <div data-color = "rgba(255, 0, 0, 0.8)" class="work_experience item" >works</div>
            <div  data-color = "rgba(255, 0, 0, 0.9)" class="image item">image</div>
            <div style="font-size: 1.7rem"  class="present item">0%</div>
        </div>
    </div>





@if(isset($present))
     <script>
         const PRESENT =  <?php print_r(json_encode($present));?>
     </script>
@endif
@endsection
