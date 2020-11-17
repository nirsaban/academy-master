@extends('masters.placementMaster')
@section('content')

<div class="content">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title" >Add Valuation and Grade</h5>
                            @if(session()->has('message'))
                            <script>Swal.fire(" {{ session()->get('message') }}", "students grades added :)", "success")</script>
                           @endif
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('upload.grades') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" id="file" name="file"  class="custom-file-input" />
                                                <br>
                                                <br>
                                              
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
