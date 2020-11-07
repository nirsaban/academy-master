@extends('masters.placementMaster')
@section('content')
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}"> -->
<!-- <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}"> -->

    <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between" >
                            <h4 class="card-title">All Students</h4>
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
                                            My CV File
                                        </th>
                                        <th class="text-center">
                                            Grade
                                        </th>
                                        <th class="text-center">
                                            Outstanding
                                        </th>
                                        <th class="text-center">
                                            Go to my Profile
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
                                            <td class="text-center"><a href="#"  data-toggle="modal" data-target="#basicModal_{{$count}}">Click to open my Cv</a></td>
                                            <td class="text-center">@if($student['grade'] != null){{$student['grade']['grade']}}@else---@endif</td>
                                            <td class="text-center">@if($student['grade'] != null )@if($student['grade']['outstanding'] == 1)<i class="fas fa-medal fa-3x"></i>@else<i class="fas fa-times fa-3x"></i>@endif @else --- @endif</td>
                                            <td class="text-center"><a onclick="checkProfileAndGetCategory('{{$student['id']}}','{{$count}}')" href="#aboutModal" data-toggle="modal" data-target="#myModal_{{$count}}"><img style="min-width: 100px; width: 100px; height: 100px; border-radius: 50%" @if($student['profile']['confirm'] == false) style="border:2px solid red" @endif @if(isset($student['profile']['image'])) src="{{asset('images/_'.$student['id'].'/'.$student['profile']['image'])}}" @else src="{{asset('images/avatar.jpg')}}" @endif name="aboutme" width="140" height="140" class="img-circle"></a></td>


                                        </tr>
                                        @endif
                                        @include('placement.partials.messageModal')
                                        @include('placement.partials.profileModal')
                                        @include('placement.partials.cvModal')
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





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
    <!-- <script src="{{asset('js/sweet.js')}}"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/placement.js')}}"></script>
@endsection
