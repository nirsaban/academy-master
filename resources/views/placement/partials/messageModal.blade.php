<div class="modal fade" id="declineModal_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title float-md-left" id="myModalLabel">Write notes to the student for  her profile</h4>
            </div>
            <div class="modal-body">
                <textarea id="errorMessage_{{$count}}" class="form-control"  rows="5" style="min-width: 100%"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="sendErrorMessage('{{$student['id']}}','{{$count}}')">send</button>
            </div>
        </div>
    </div>
</div>
