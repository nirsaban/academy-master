<div class="modal fade" id="myModalEducation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h4 class="modal-title mt-0" id="myModalLabel">Add Education</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body flex educationsInputs" style="display: flex; flex-direction: column;">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <div class="btn btn-info" onclick="addInputsEdu(event)">
                            <i class="fa fa-plus fa-lg"></i>
                            <span>Add</span>
                        </div>
                    </div>
                </div>
                @if(isset($profile[0]['education']))
                    @foreach(json_decode($profile[0]['education']) as $edu)
                    @if(strlen($edu->FieldStudy) > 2)
                    <div>
                        <div class="row col-lg-12" >
                            <input type="text"  value = "{{$edu->FieldStudy}}"  class="col-lg-5 p-1 mb-2 field form__field " placeholder="Field of Study" >
                              <select  class="col-lg-3 p-1 mb-2 start field form__field edu" style="margin-right: 4px;margin-left:4px" onchange="checkTheEnd(this)">
                                 <option value="">Start year</option>
                                 @foreach($years as $year)
                                 <option   @if($year == json_decode($edu->startYear)) selected @endif value="{{$year}}" >{{$year}}</option>
                                 @endforeach;
                                </select>

                            <select value = "{{$edu->endYear}}" class="col-lg-3 p-1 mb-2 field end  form__field edu" onchange="checkTheStart(this)">
                                <option value="">End year</option>
                                @foreach($years as $year)
                                 <option @if($year == json_decode($edu->endYear))selected @endif value="{{$year}}" >{{$year}}</option>
                                 @endforeach;
                             </select>
                        </div>
                    </div>
         @endif
                    @endforeach
                @else
                <div>
                <div class="row col-lg-12" >
                    <input type="text"    class="col-lg-5 p-1 mb-2 field form__field " placeholder="Field of Study" >
                      <select class="col-lg-3 p-1 mb-2 start field form__field edu" style="margin-right: 4px;margin-left:4px" onchange="checkTheEnd(this)">
                         <option value="">Start year</option>
                         @foreach($years as $year)
                                 <option value="{{$year}}" >{{$year}}</option>
                                 @endforeach;
                         </select>

                    <select class="col-lg-3 p-1 mb-2 field end  form__field edu" onchange="checkTheStart(this)">
                        <option value="">End year</option>
                        @foreach($years as $year)
                        <option value="{{$year}}" >{{$year}}</option>
                        @endforeach;
                     </select>
                  </div>
              </div>
                @endif

            </div>
            <div id="errorEdu"  class="text-center text-danger"></div><br>
            <div class="modal-footer justify-content-center">

                <button type="button" class="btn btn-primary" onclick="updateEducation('{{Auth::id()}}')">Save</button>
            </div>
        </div>
    </div>
</div>
