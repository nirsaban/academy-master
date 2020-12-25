<div class="modal fade" id="myModalWorks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                    <h4 class="modal-title mt-0" id="myModalLabel">Add Work Experience</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body flex worksInputs" style="display: flex; flex-direction: column;">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <div class="btn btn-info" onclick="addInputsWorks(event)">
                            <i class="fa fa-plus fa-lg"></i>
                            <span>Add</span>
                        </div>
                    </div>
                </div>
                @if(isset($profile[0]['work_experience']))
                    @foreach(json_decode($profile[0]['work_experience']) as $work)
                        @if(strlen($work->theJob) > 2)
                        <div>
                            <div class="row col-lg-12" >
                                <input type="text"  value = "{{$work->theJob}}"  class="col-lg-5 p-1 mb-2 field form__field " placeholder="The job..." >
                                  <select  class="col-lg-3 p-1 mb-2 start field form__field edu" style="margin-right: 4px;margin-left:4px" onchange="checkTheEnd(this)">
                                     <option value="">Start year</option>
                                     @foreach($years as $year)
                                     <option   @if($year == json_decode($work->startYear)) selected @endif value="{{$year}}" >{{$year}}</option>
                                     @endforeach;
                                    </select>

                                <select value = "{{$edu->endYear}}" class="col-lg-3 p-1 mb-2 field end  form__field edu" onchange="checkTheStart(this)">
                                    <option value="">End year</option>
                                    @foreach($years as $year)
                                     <option @if($year == json_decode($work->endYear))selected @endif value="{{$year}}" >{{$year}}</option>
                                     @endforeach;
                                 </select>
                                 <i class="fa fa-trash-alt fa-md fa-2x" style="color: rgb(238, 126, 126);margin-left:2px" onclick="this.parentNode.remove()"></i>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @else
                <div>
                    <div class="row col-lg-12" >
                        <input type="text"    class="col-lg-5 p-1 mb-2 field form__field " placeholder="The job..." >
                          <select class="col-lg-3 p-1 mb-2 start field form__field work" style="margin-right: 4px;margin-left:4px" onchange="checkTheEnd(this)">
                             <option value="">Start year</option>
                             @foreach($years as $year)
                                     <option value="{{$year}}" >{{$year}}</option>
                                     @endforeach;
                             </select>

                        <select class="col-lg-3 p-1 mb-2 field end  form__field work" onchange="checkTheStart(this)">
                            <option value="">End year</option>
                            @foreach($years as $year)
                            <option value="{{$year}}" >{{$year}}</option>
                            @endforeach;
                         </select>
                      </div>
                  </div>
                  <i class="fa fa-trash-alt fa-md fa-2x" style="color: rgb(238, 126, 126);margin-left:2px" onclick="this.parentNode.remove()"></i>
                @endif

            </div>
            <div id="errorWork"  class="text-center text-danger"></div><br>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" onclick="updateWorks('{{Auth::id()}}')">Save</button>
            </div>
        </div>
    </div>
