@extends('masters.adminMaster')
@section('content')

<!-- <link rel="stylesheet" href="{{ URL::asset('css/createCourse.css') }}"> -->

    <div class="content">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title">Add Course</h5>
                        </div>
                        <div class="card-body">
                            <form onsubmit="return false">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <input
                                                id="course"
                                                type="text"
                                                class="form-control text-capitalize"
                                                placeholder="Course Name"
                                                required
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" id="parentCategories">
                                            <label>Add Category</label>
                                            <!-- <input
                                                type="text"
                                                class="form-control text-capitalize mt-2"
                                                placeholder="Name"
                                                onblur="animatePluse()"
                                            /> -->
                                            <div class="d-flex flex-column">
                                                <!-- <span id="span" class="m-1 p-2 bg-light position-relative">
                                                    FrontEnd
                                                    <span class="cancel-color cursor-pointer bg-danger" style="
                                                            position: absolute;
                                                            top: 0;
                                                            right: 0;
                                                            padding: 10px;
                                                            height: 100%;
                                                        ">
                                                        <i class="nc-icon nc-simple-delete"></i>
                                                    </span>
                                                </span>
                                                <span id="span" class="m-1 p-2 bg-light position-relative">
                                                    FrontEnd
                                                    <span class="cancel-color cursor-pointer bg-danger" style="
                                                            position: absolute;
                                                            top: 0;
                                                            right: 0;
                                                            padding: 10px;
                                                            height: 100%;
                                                        ">
                                                        <i class="nc-icon nc-simple-delete"></i>
                                                    </span>
                                                </span> -->
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button onclick="addCategory(this)" type="button" class="btn btn-dark btn-round">
                                                <i class="nc-icon nc-simple-add"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update ml-auto mr-auto">
                                        <button onclick="createNewCourse()" type="submit" class="btn btn-primary btn-round" value="Create new">Create Now</button>
                                        <div class="errorMessage" style="color: red;font-size: 12px;text-align: center"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>

        <!-- <div class="form_container">
            <div class="title_container">
                <h2>create new course and categories</h2>
            </div>
            <div class="row clearfix">
                <div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-heading"></i></span>
                            <input type=text id="course" placeholder="course name..." required />
                        </div>
                        <div class="input_field" id="parentCategories"> <span id="span"><i aria-hidden="true" onclick="addCategory(this)" class="fas fa-plus-square "></i></span>
                            <input type="text"  class="category" placeholder="category name..." required onblur="animatePluse()"/><br>
                        </div>
                        <input onclick="createNewCourse()" class="button" type="submit" value="Create new" />
                         <div class="errorMessage" style="color: red;font-size: 12px;text-align: center"></div>
                </div>
            </div>
        </div>
    </div> -->


<script src="{{asset('js/placement.js')}}"></script>
@endsection
