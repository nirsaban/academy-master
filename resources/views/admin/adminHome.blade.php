@extends('masters.adminMaster')
@section('content')
        <!-- <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}"> -->

        <div class="content">

        <div class="row d-flex justify-content-center">
            <div class="chart_area" style=" width: 60rem; height: 30rem; margin-bottom: 50px">
                <select name="data-set" id="data-set" onchange="updateGraph();" class="form-control text-center">
                    <option selected disabled>-- Filter By --</option>
                    <option value="job" selected>jobs</option>
                    <option value="student">student</option>
                    <option value="success" >Start of transaction</option>
                </select>
                <!-- <div id="chartdiv00" style="height: 360px; background-color: #f0f0f0; float: left;"></div> -->
                <canvas id="myChart" style=""></canvas>
            </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between" >
                            <h4 class="card-title">Bingo</h4>
                        </div>
                        <div class="card-header">
                            <form>
                                <div class="input-group no-border">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Search..."
                                        style="padding: 0; margin-bottom: 0"
                                        id="myInput"
                                        onkeyup="myFunction()"
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
                                            Company
                                        </th>
                                        <th class="text-center">
                                            Job
                                        </th>
                                        <th class="text-center">
                                            Little More
                                        </th>
                                        <th class="text-center">
                                            Disabled
                                        </th>
                                    </thead>
                                    <tbody>
                                    <?php $count = 0;?>
                                        @foreach($success as $bingo)
                                            <?php $count++?>
                                            <tr @if($bingo['job']['confirm'] == 0 ) style="background-color:rgba(200,40,40,0.3);" @endif>
                                                <td class="text-center "><?=$count?></td>
                                                @foreach($courses as $course)
                                                    @if($bingo['user']['course_id'] == $course['id'])
                                                        <td class="text-center font-weight-bolder ">{{$course['name']}}</td>
                                                    @else @continue;
                                                    @endif
                                                @endforeach
                                                <td class="text-center ">{{$bingo['user']['name']}}</td>
                                                <td class="text-center ">{{$bingo['job']['company']}}</td>
                                                <td class="text-center ">{{$bingo['job']['title']}}</td>
                                                <td class="text-center ">{{$bingo['status_message'] ?? 'no more..'}}</td>
                                                @if($bingo['job']['confirm'] == 0 )
                                                    <td class="text-center ">
                                                        <button type="button" class="btn btn-primary btn-round bg-danger">
                                                                <i class="nc-icon nc-simple-delete" style="font-size: 0.6rem"></i>
                                                        </button>
                                                    </td>
                                                @else
                                                    <td class="text-center " disabled="true">
                                                        <button type="button" class="btn btn-primary btn-round bg-danger" onclick="disabled('{{$bingo['user']['id']}}','{{$bingo['job']['id']}}')">
                                                                <i class="nc-icon nc-simple-delete" onclick="disabled('{{$bingo['user']['id']}}','{{$bingo['job']['id']}}')" style="font-size: 0.6rem"></i>
                                                        </button>
                                                    </td>
                                                @endif
                                            </tr>
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
                if (td || td2) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter)   > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }



    </script>
    <script>
        const courses = <?php print_r(json_encode($courses));?>;
        const success = <?php print_r(json_encode($success));?>;
    </script>

@endsection
