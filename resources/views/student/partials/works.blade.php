<div class="modal fade" id="myModalWorks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                    <h4 class="modal-title mt-0" id="myModalLabel">Add Works</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body flex worksInputs" style="display: flex; flex-direction: column;">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <div class="btn btn-info" onclick="addInputsWorks()">
                            <i class="fa fa-plus fa-lg"></i>
                            <span>Add</span>
                        </div>
                    </div>
                </div>
                @if(isset($profile[0]['work_experience']))
                    @foreach(json_decode($profile[0]['work_experience']) as $work)
                        @if(strlen($work) > 2)
                            <input  type="text" value="{{$work}}" class="col-12 field form__field work p-2 mb-2"   placeholder="enter work experience...">
                        @endif
                    @endforeach
                @else
                    <input  type="text" class="col-12 field form__field work p-2 mb-2"   placeholder="enter work experience...">
                @endif

            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" onclick="updateWorks('{{Auth::id()}}')">Save</button>
            </div>
        </div>
    </div>
