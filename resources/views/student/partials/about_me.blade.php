<div class="modal fade" id="aboutMeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h4 class="modal-title float-md-left m-0" id="myModalLabel">Write more about your self</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea id="about_me" class="form-control"  rows="5" style="min-width: 100%"> {{$profile[0]['about_me'] ?? ''}}</textarea>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" onclick="updateAboutMe('{{Auth::id()}}')">Save</button>
            </div>
        </div>
    </div>
</div>
