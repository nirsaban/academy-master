@extends('masters.adminMaster')
@section('content')
    <!-- <main style="margin-top: 5rem" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"> -->

    <!-- <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}"> -->
    <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between" >
                            <h4 class="card-title"> All Students</h4>
                        </div>
                        <div class="card-header">
                            <form>
                                <div class="input-group no-border">
                                <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Search..."
                                        style="padding: 0; margin-bottom: 0"
                                        onkeyup="myFunction()"
                                        id="myInput"
                                    />
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table">
                                    <thead class=" text-primary">
                                        <th class="text-center">
                                            Sno
                                        </th>
                                        <th class="text-center">
                                            Course
                                        </th>
                                        <th class="text-center">
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Go to my profile
                                        </th>

                                    </thead>
                                    <tbody>
                                    <?php $count  = 0;?>
                                    @foreach($allStudent as $student)
                                        @if(!$student['profile']['category_id'])
                                            @continue
                                        @else
                                    <?php $count++ ?>
                                        <tr @if($student['profile']['confirm'] == false) style="color:red;background-color: rgba(255,3,18,0.1)" @endif>
                                            <td class="text-center"><?= $count ?></td>
                                            <td class="text-center">{{$student['course']['name']}}</td>
                                            <td class="text-center">{{$student['name']}}</td>
                                            <td class="text-center">
                                                <button onclick="checkProfileAndGetCategory('{{$student['id']}}','{{$count}}')" href="#aboutModal" data-toggle="modal" data-target="#myModal_{{$count}}"type="button" class="btn btn-primary btn-round bg-warning">
                                                    Show More
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
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
                                                        <p class="text-left"><strong>About me: </strong><br>
                                                            {{$student['profile']['about_me']}}
                                                            <br>
                                                    @endif
                                                </center>
                                                <center>
                                                    @if(isset($student['profile']['links']))
                                                        <p class="text-left"><strong>work Link: </strong><br>
                                                            @foreach(json_decode($student['profile']['links']) as $link)
                                                                @if(strlen($link) > 2)
                                                                    <a href="{{$link}}">{{$link}}</a><br>
                                                    @endif
                                                    @endforeach
                                                        </p>
                                                    @endif

                                                </center>
                                                <center>
                                                    @if(isset($student['profile']['education']))
                                        <p class="text-left"><strong>Education: </strong><br>
                                        @foreach(json_decode($student['profile']['education']) as $edu)
                                            @if(strlen($edu) > 2)
                                                {{$edu}}<br>
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
                                                @if(strlen($work) > 2)
                                                    {{$work}}<br>
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
                        </td>
                    </tr>

                    @endif

     <div class="modal fade" id="declineModal_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <h4 class="modal-title float-md-left" id="myModalLabel">Write notes to the student for  her profile</h4>
                 </div>
                 <div class="modal-body">
                     <textarea id="errorMessage_{{$count}}" class="form-control"  rows="5" style="min-width: 100%"></textarea>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary" onclick="sendErrorMessage('{{$student['id']}}','{{$count}}')">send</button>
                 </div>
             </div>
         </div>
     </div>
                @endforeach
            </table>
            <!-- Modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <!-- <div class="container ">
            <div class="row">
            <h2>All student</h2>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for match.." title="Type in a name">
                <table id="myTable" border="1px solid black">
                    <tr  class="header">
                    <th style="width:10%">#</th>
                    <th style="width:30%;">course</th>
                    <th style="width:30%;">name</th>
                    <th style="width:10%;">go To my Profile</th>
                </tr>
                <?php $count  = 0;?>
                @foreach($allStudent as $student)
                    @if(!$student['profile']['category_id'])
                        @continue
                    @else
                    <?php $count++ ?>
                    <tr @if($student['profile']['confirm'] == false) style="color:red;background-color: rgba(255,3,18,0.1)" @endif>
                        <td><?= $count ?></td>
                        <td>{{$student['course']['name']}}</td>
                        <td>{{$student['name']}}</td>
                        <td>
                                <div class="col-1" >
                                    <center>
                                        <a onclick="checkProfileAndGetCategory('{{$student['id']}}','{{$count}}')" href="#aboutModal" data-toggle="modal" data-target="#myModal_{{$count}}"><img @if($student['profile']['confirm'] == false) style="border:2px solid red" @endif @if(isset($student['profile']['image'])) src="{{asset('images/_'.$student['id'].'/'.$student['profile']['image'])}}" @else src="{{asset('images/avatar.jpg')}}" @endif name="aboutme" width="140" height="140" class="img-circle"></a>
                                    </center>
                                </div>


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
                                                        <p class="text-left"><strong>About me: </strong><br>
                                                            {{$student['profile']['about_me']}}
                                                            <br>
                                                    @endif
                                                </center>
                                                <center>
                                                    @if(isset($student['profile']['links']))
                                                        <p class="text-left"><strong>work Link: </strong><br>
                                                            @foreach(json_decode($student['profile']['links']) as $link)
                                                                @if(strlen($link) > 2)
                                                                    <a href="{{$link}}">{{$link}}</a><br>
                                                    @endif
                                                    @endforeach
                                                        </p>
                                                    @endif

                                                </center>
                                                <center>
                                                    @if(isset($student['profile']['education']))
                                        <p class="text-left"><strong>Education: </strong><br>
                                        @foreach(json_decode($student['profile']['education']) as $edu)
                                            @if(strlen($edu) > 2)
                                                {{$edu}}<br>
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
                                                @if(strlen($work) > 2)
                                                    {{$work}}<br>
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
                        </td>
                    </tr>

                    @endif

     <div class="modal fade" id="declineModal_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <h4 class="modal-title float-md-left" id="myModalLabel">Write notes to the student for  her profile</h4>
                 </div>
                 <div class="modal-body">
                     <textarea id="errorMessage_{{$count}}" class="form-control"  rows="5" style="min-width: 100%"></textarea>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary" onclick="sendErrorMessage('{{$student['id']}}','{{$count}}')">send</button>
                 </div>
             </div>
         </div>
     </div>
                @endforeach
            </table>



        </div>
    </div> -->

    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->


    <script >

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                if (td || td2 ) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter)   > -1 ) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }



    </script>
    <script src="{{asset('js/sweet.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/placement.js')}}"></script>
@endsection


