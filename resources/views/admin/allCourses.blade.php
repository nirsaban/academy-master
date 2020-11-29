@extends('masters.adminMaster')
@section('content')

    <!-- <main style="margin-top: 5rem" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"> -->
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}"> -->

    <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between" >
                            <h4 class="card-title"> Courses Data</h4>
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
                                            Course Name
                                        </th>
                                        <th class="text-center">
                                            Categories
                                        </th>
                                        <th class="text-center">
                                            Options
                                        </th>
                                    </thead>
                                    <tbody>
                                    <?php $count = 0;?>
                                        @foreach($courses as $course)
                                            <?php $count++?>
                                            <tr>
                                                <td class="text-center "><?=$count?></td>
                                                <td class="text-center ">{{$course['name']}}
                                                <button data-toggle="modal" data-target="#exampleModal_{{$count}}" type="button" class="btn btn-primary btn-round bg-warning">
                                                        <i data-toggle="modal" data-target="#exampleModal_{{$count}}"  class="nc-icon nc-ruler-pencil" style="font-size: 0.6rem"></i>
                                                </button>
                                                <button onclick="deleteCourse('{{$course['id']}}',this.dataset)" data-courseName="{{$course['name']}}" type="button" class="btn btn-primary btn-round bg-danger ml-2">
                                                    <i class="nc-icon nc-simple-delete" style="font-size: 0.6rem"></i>
                                                </button>
                                                </td>
                                                <td class="text-center " id="flexText">
                                                    <?php $countCat = 0;?>
                                                    @foreach($course['category'] as $category)
                                                        @foreach($countCategoryUser as $key => $counter)
                                                            @foreach($countCategoryJob as $name => $num)
                                                                @if($key ==  $category['cat_name'] && $name ==  $category['cat_name'] )
                                                                    <?php $countCat++;?>
                                                                    {{$category['cat_name'].', '}}
                                                                    <button data-toggle="modal" data-target="#exampleModalCategory_{{$category['id']}}" type="button" class="btn btn-primary btn-round bg-warning">
                                                                        <i class="nc-icon nc-ruler-pencil" style="font-size: 0.6rem"></i>
                                                                    </button>
                                                                    <button type="button" onclick="deleteCategory('{{$category['id']}}','{{$category['cat_name']}}')" class="btn btn-primary btn-round bg-danger ml-2">
                                                                        <i class="nc-icon nc-simple-delete" style="font-size: 0.6rem" ></i>
                                                                    </button>
                                                                    <div class="tags">
                                                                    <br>
                                                                    @include('admin.partials.EditCategory')
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach


                                                </td>
                                                <td class="text-center"><i class="fas fa-user-graduate fa-2x"></i><span
                                                    class="tags">&nbsp;&nbsp;{{$countCourseUser[$course['name']]}}</span></td>
                                            <td class="text-center"><i class="fas fa-briefcase fa-2x"></i><span
                                                    class="tags">&nbsp;&nbsp;{{$countCourseJob[$course['name']]}}</span></td>
                                            </tr>

                                            @include('admin.partials.EditCourse')
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <script>

        function myFunction() {
            console.log("Hello")
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

                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }


    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/placement.js')}}"></script>





@endsection

