@if($newMatches ?? '')

    <div class="modal fade" id="myModalMatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title float-lg-left">Well done {{Auth::user()->name}} </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="location.reload()">x</button>

                </div>
                <div class="modal-body" style="font-size: 1.1rem">
                    <?php $count = 0;?>
                    @foreach($newMatches ?? '' as $match)
                        <?php $count ++;?>
                        <p class="border-bottom">{{$count. '-' .$match['message']}}</p>

                    @endforeach            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Close</button>
                    <button type="button" onclick="confirmMessages('{{Auth::id()}}','matches')" class="btn btn-primary">confirm all messages</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endif
<div class="modal fade" id="myModal_old" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title float-lg-left"> old messages </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="location.reload()">x</button>

            </div>
            <div class="modal-body font-weight-normal" id="bodyold">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<div class="modal fade" id="myModal_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title float-lg-left">jobs messages </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="location.reload()">x</button>

            </div>
            <div class="modal-body font-weight-normal" id="bodyprofile">

            </div>
            <div class="modal-footer">
                <button type="button" onclick="confirmMessages('{{Auth::id()}}','notes')" class="btn btn-primary">confirm all messages</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
