<div class="modal fade" id="exampleModal_{{$count}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" value="{{$course['name']}}"
                       id="inputEditCourse_{{$count}}">
                <input type="hidden" value="{{$course['id']}}" id="idCourse{{$count}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="editCourse('{{$count}}')">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
