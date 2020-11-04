@extends('masters.adminMaster')
@section('content')
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}"> -->
    
        <div class="content">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title" >Add new Placement Users</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('upload.placement') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" id="file" name="file" class="custom-file-input" />
                                                @error('file')
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
                                    @if($errors->any() && $errors->first() != 'you must choose Exel file before sending')
                                        <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{$errors->first()}}</div>
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


    <!-- <div class="container">
        <h2 class="display-5 text-center" style="margin-top: 2rem">Add new Placement Users</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">{{ __('add Placement Users') }}
                        @if(session()->has('message'))
                            <div class="blur-out-expand-fwd">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('upload.placement') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group  ">
                                <label for="file" class="col-md-4 col-form-label text-sm-right">{{ __('Choose File') }}</label>
                                <label  for="file" class="file-input btn btn-dark btn-file" />Browse...</label>
                                <input type="file" id="file" name="file" style="display: block" />
                                @error('file')
                                <br>
                                <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group  mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn -border-none"  type="submit" ><i class="fas fa-upload fa-3x"></i></button>
                                </div>
                                @if($errors->any() && $errors->first() != 'you must choose Exel file before sending')
                                    <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{$errors->first()}}</div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
  -->






@endsection
