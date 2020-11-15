@extends('masters.employerMaster')
@section('content')


    <!-- <link rel="stylesheet" href="{{ URL::asset('css/employer.css') }}"> -->

    <div class="content">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title">Create a new job</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/job/create')}}" method="POST">
                            @csrf
                            <input type="hidden" name="category_id" id="trickCat">
                            <input type="hidden" name="requirements" id="trickReq">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Main Title</label>
                                            <select class="form-control" onchange="onChangeCourse(this)" id="courseRegister" name="course_id">
                                                <option selected="true" disabled="disabled">main subject</option>
                                                @foreach($courses as $course)
                                                <option value="{{$course['id']}}">{{$course['name']}}</option>
                                                @endforeach
                                            </select>
                                            @error('course_id')
                                            <div class="validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div id="subSelect">


                                </div>
                                @error('course_id')
                                <div class="validation">{{ $message }}</div>
                                @enderror
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input
                                                type="text"
                                                name="title"
                                                value = "{{old('title')}}"
                                                class="form-control text-capitalize"
                                                placeholder="Title"
                                                required
                                            />
                                            @error('title')
                                            <div class="validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input
                                                type="text"
                                                name="company"
                                                value = "{{old('company')}}"
                                                class="form-control text-capitalize"
                                                placeholder="Company Name"
                                                required
                                            />
                                            @error('company')
                                            <div class="validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea
                                                name="description"
                                                type="text"
                                                value = "{{old('description')}}"
                                                class="form-control text-capitalize"
                                                placeholder="Description"
                                                required
                                            >
                                            </textarea>
                                            @error('description')
                                            <div class="validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <div id="requirementsAll">
                                            <label>Requirements</label>
                                            <input type="text" class="form-control text-capitalize require  @error('requirements') is-invalid @enderror"  id="reqIn" placeholder="add require..."/>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                                <button onclick="addRequire()" id="disabledPlus" type="button" class="btn btn-dark btn-round">
                                                        <i class="nc-icon nc-simple-add"></i>
                                                    </button>
                                                    <button onclick="saveAllRequire(this)" id="disabled" type="button" class="btn btn-primary btn-round">
                                                        <i class="nc-icon nc-check-2"></i>
                                                    </button>
                                        </div>
                                        @error('requirements')
                                        <div class="validation ">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Salary</label>
                                            <input
                                                name="salary"
                                                id="currency-field"
                                                data-type="currency"
                                                type="text"
                                                class="form-control text-capitalize"
                                                placeholder="₪6,000"
                                                value = "{{old('salary')}}"
                                                required
                                            />
                                            @error('salary')
                                            <div class="validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Company Address</label>
                                            <input
                                                name="location"
                                                placeholder=" Dizengoff 3,Tel-Aviv "
                                                type="text"
                                                class="form-control text-capitalize"
                                                value = "{{old('location')}}"
                                                required
                                            />
                                            @error('location')
                                            <div class="validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input
                                                name="phone"
                                                placeholder="this format: 03-1234567"
                                                pattern="^0\d([\d]{0,1})([-]{0,1})\d{7}$"
                                                type="text"
                                                class="form-control text-capitalize"
                                                value = "{{old('phone')}}"
                                                required
                                            />
                                            @error('phone')
                                            <div class="validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input
                                                type="email"
                                                value = "{{old('email')}}"
                                                name="contact_email"
                                                class="form-control text-capitalize"
                                                placeholder="Email"
                                                required
                                            />
                                            @error('contact_email')
                                            <div class="validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary btn-round">Save Job</button>
                                        <div class="errorMessage" style="color: red;font-size: 12px;text-align: center"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update ml-auto mr-auto">

                                        <button type="submit" class="btn btn-dark btn-round"  onclick="resetForm()">Reset</button>
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
    <script src="{{url('js/createjob.js')}}"></script>
@endsection
