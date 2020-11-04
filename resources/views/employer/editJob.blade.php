@extends('masters.employerMaster')
@section('content')
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/editJob.css') }}"> -->
    
    <div class="content">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title">Edit your job post</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{url('updateJob')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$job->id}}" name="id" >
                            <input type="hidden" value="{{$job->course_id}}" name="course_id" id="trickCat">
                            <input type="hidden" name="requirements" value="{{$job->requirements}}" id="trickReq">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Edit Category</label>
                                            <select class="form-control" id="courseRegister" name="category_id">
                                            <option selected="true" disabled="disabled">main subject</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if(json_decode($category->id) == json_decode($job->category_id)) selected style="background-color:#F6AA93;color:#FFF " @endif >{{$category['cat_name']}}</span></option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input
                                                value="{{$job->title}}" 
                                                name="title" 
                                                type="text"
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
                                                value="{{$job->company}}" 
                                                name="company"
                                                type="text"
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
                                                class="form-control text-capitalize"
                                                placeholder="Description"
                                                required
                                            >
                                                {{$job->description}}
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
                                            @foreach(json_decode($job->requirements) as $require)
                                                <input type="text" value="{{$require}}" class="form-control text-capitalize require  @error('requirements') is-invalid @enderror"  id="reqIn"    placeholder="add require..."/>
                                            @endforeach
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
                                                value="{{$job->salary}}" 
                                                data-type="currency"
                                                type="text"
                                                class="form-control text-capitalize"
                                                placeholder="₪6,000"
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
                                                value="{{$job->location}}"  
                                                placeholder=" Dizengoff 3,Tel-Aviv "
                                                type="text"
                                                class="form-control text-capitalize"
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
                                                value="{{$job->phone}}"  
                                                name="phone" 
                                                placeholder="this format: 03-1234567" 
                                                pattern="^0\d([\d]{0,1})([-]{0,1})\d{7}$" 
                                                type="text"
                                                class="form-control text-capitalize"
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
                                                value="{{$job->contact_email}}"  
                                                name="contact_email"
                                                type="text"
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
                                        <button type="submit" class="btn btn-primary btn-round">Update Job</button>
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

    <script src="{{url('js/editjob.js')}}"></script>
@endsection
