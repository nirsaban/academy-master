@extends('masters.placementMaster')
@section('content')

<div class="content">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title" >Add CV Format</h5>
                            @if(session()->has('message'))
                            <script>Swal.fire(" {{ session()->get('message') }}", "cv foramt  added :)", "success")</script>
                           @endif
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('upload.cvFormat') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" id="cv" name="cv" class="custom-file-input" />
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
                                    <div class="col-md-12">
                                    <select class="form-control" name="course_id" id="course_id" >
                                    <option  disabled>you must choose course</option>
                                        @foreach($courses as $course)
                                            <option value="{{$course['id']}}">{{$course['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                    <script>Swal.fire(" {{$errors->first()}}", "somethong faild :(", "error")</script>
                                    @enderror
                                </div>
                                </div>
                                <div class="row" style="margin-top: 50px">
                                    <div class="update ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary btn-round">Upload Now</button>
                                    </div>
                                    @if($errors->any() && $errors->first() != 'you must choose Pdf file before sending' &&  $errors->first() != 'you must choose Course from dropdown before sending')
                                    <script>Swal.fire(" {{$errors->first()}}", "somethong faild :(", "error")</script>
                                   @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection
