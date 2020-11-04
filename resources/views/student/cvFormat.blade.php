@extends('masters.studentMaster')
@section('content')


    <div class="content">
        @if($cvFile)

        <div class="modal fade" id="myModalCv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">CV Format  - <small>see and learn to write best Cv</small></h4> <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body">

                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active text-center">
                                <iframe width="700" height="800" src="{{asset('cvFormat/_'.Auth::user()->course_id.'/'.$cvFile)}}" frameborder="0" allowfullscreen></iframe>
                            </div>
                            </div>
                        </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>

    </div>
    </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title" >{{ __('Add  Your cv ') }}</h5>
                            <div class="text-center">
                                @if(session()->has('message'))
                                <div class="" style="font-size: 1.7rem;margin-top:2rem">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('upload.cvToCheck') }}" enctype="multipart/form-data" >
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" id="file" name="cv" class="custom-file-input" />
                                                @error('cv')
                                                <br>
                                                <div class="validation text-danger text-center text-info small" style="font-size: .7rem;margin-top:2rem">{{ $message }}</div>
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
                                    @if($errors->any() && $errors->first() != 'you must choose Pdf file before sending' &&  $errors->first() != 'you must choose Course from dropdown before sending')
                                        <div class="validation text-danger text-center text-info small" style="font-size: .7rem;margin-top:2rem">{{$errors->first()}}</div>
                                    @endif



                                </div>
                            </form>
                            <!-- <button class="btn btn-primary btn-round" href="#aboutModal" data-toggle="modal" data-target="#myModalLabel">Show</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    @else
    <script>
        alert('dddddddddd')

         </script>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Sorry {{Auth::user()->name}} No cv format Found </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <small>to return home please click a button below</small>
                </div>
                <div class="modal-footer">
                    <a href="{{url('/student')}}"> <button type="button" class="btn btn-primary">Back</button></a>
                </div>
            </div>
        </div>
        @endif
        <script src="{{asset('js/messages.js')"></script>
@endsection

