<div style="color: black" class="modal fade " id="myModal_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">x</button>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">More About {{$student['name']}}</h4>
            </div>
            <div class="modal-body">
                <center>
                    <img @if(isset($student['profile']['image'])) src="{{asset('images/_'.$student['id'].'/'.$student['profile']['image'])}}" @else src="{{asset('images/avatar.jpg')}}" @endif name="aboutme" width="140" height="140" class="img-circle">
                    <h3 class="media-heading">{{$student['name']}}</h3>
                    <h4 class="media-heading" id="category_id{{$count}}"></h4>
                    @if(isset($student['profile']['my_skills']))
                    <span><strong>Skills: </strong></span>
                        @foreach(json_decode($student['profile']['my_skills']) as $skill)
                            @if(strlen($skill) > 2)
                                <span class="label label-warning">{{$skill}}</span>
                            @endif
                        @endforeach
                    @endif
                    <br>
                </center>
                <hr>
                <center>
                    @if(isset($student['profile']['about_me']))
                           <p class="text-left" style="width: 300px !important;word-break: break-word;"><strong>About me: </strong><br>
                            {{$student['profile']['about_me']}}
                            <br>
                    @endif
                </center>
                <center>
                    @if(isset($student['profile']['links']))
                    <?php $id = $student['id'];

                    ?>
                     <a  onclick="window.location='{{url('portFolio').'/'.$id}}'">Go to my portfolio</a>
                    @endif
                </center>
                <center>
                                       @if(isset($student['profile']['education']))
                                           <p class="text-left"><strong>Education: </strong><br>
                                           @foreach(json_decode($student['profile']['education']) as $edu)
                                           @if(strlen($edu->FieldStudy) > 2)
                                           <li class="tags text-capitalize">{{$edu->FieldStudy}} ,({{$edu->startYear}}-{{$edu->endYear}})</li>
                                           @endif
                                           @endforeach
                                           </p>
                                       @endif
                                   </center>
                                   <hr>
                                   </center>
                                   <center>
                                       @if(isset($student['profile']['work_experience']))
                                           <p class="text-left"><strong>Works: </strong><br>
                                               @foreach(json_decode($student['profile']['work_experience']) as $work)
                                               @if(strlen($work->theJob) > 2)
                                               <li class="tags text-capitalize">{{$work->theJob}} ,({{$work->startYear}}-{{$work->endYear}})</li>
                                               @endif
                                       @endforeach
                                           </p>
                                       @endif
                                   </center>
                               <div class="modal-footer">
                                   @if($student['profile']['confirm'] == false)
                                    <button class="btn btn-success" data-type ='student' data-bool = true onclick="confirm('{{$student['id']}}',this.dataset)">Confirm this Profile</button>
                                     @else
                                       <button class="btn btn-danger" data-type ='student' data-bool = false onclick="confirm('{{$student['id']}}',this.dataset)">Block this profile</button>
                                   @endif
                                   <button type="button" data-dismiss="modal" value="Decline" class="btn btn-warning"  data-toggle="modal"  data-target="#declineModal_{{$count}}">Send message</button>
                               </div>
                           </div>
                       </div>
                   </div>

                   </div>
