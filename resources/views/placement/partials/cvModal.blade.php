@if($student['profile']['cv'])
<div class="modal fade" id="basicModal_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{$student['name']}} CV  - <small>please send me message about my cv</small></h4> <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <!-- data-interval="false" prevents the carousel from cycling automatically -->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active text-center">
                            <iframe width="700" height="800" src="{{asset('cvStudent/_'.$student['id'].'/'.$student['profile']['cv'])}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        </div>
                    </div>

            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@else
<div class="modal fade" id="basicModal_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{$student['name']}} CV  - <small>please send me message about my cv</small></h4> <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <!-- data-interval="false" prevents the carousel from cycling automatically -->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active text-center">
                        <h3>{{$student['name']}} no add cv file :(</h3>
                        </div>
                        </div>
                    </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endif
