@extends('masters.placementMaster')
@section('content')
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}"> -->

    <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between" >
                            <h4 class="card-title">All Matches</h4>
                        </div>
                        <div class="card-header">
                            <form>
                                <div class="input-group no-border">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Search..."
                                        style="padding: 0; margin-bottom: 0"
                                        id="myInput"
                                        onkeyup="myFunction()"
                                    />
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table">
                                    <thead class=" text-primary">
                                        <th class="text-center">
                                            Sno
                                        </th>
                                        <th class="text-center">
                                            Course Name
                                        </th>
                                        <th class="text-center">
                                            Job
                                        </th>
                                        <th class="text-center">
                                            Send Message
                                        </th>
                                        <th class="text-center">
                                            <3
                                        </th>
                                        <th class="text-center">
                                            Student
                                        </th>
                                        <th class="text-center">
                                            Send Message
                                        </th>
                                        <th class="text-center">
                                            Message Status
                                        </th>
                                        <th class="text-center">
                                            Job Interview Date
                                        </th>
                                        <th class="text-center">
                                            Start of Transaction
                                        </th>
                                    </thead>
                                    <tbody>
                <?php $count  = 0;?>
                @foreach($perfectMatches as $match)
                <?php $count++ ?>
                <tr>
                    <td><?= $count ?></td>
                    <td  class="text-center">{{$match[0]['course']['name']}}</td>
                    <td class="text-center">{{$match[0]['title']}}<br><small>{{$match[0]['company']}}</small></td>
                    <td class="text-center"> <i class="far fa-paper-plane share fa-2x"  data-dismiss="modal" value="Decline"   data-toggle="modal"  data-target="#declineModalToEmployer_{{$count}}"  onclick="setTextAreaToEmployer('{{$match[0]['user']['name']}}','{{$match[0]['title']}}','{{$match[1]['name']}}','{{Auth::user()->name}}','{{$match[0]['user']['id']}}','{{$match[1]['id']}}',{{$match[0]['id']}},'{{$count}}')"></i></td>
                    <td class="text-center"><img   width="80px" height="70px"  src="{{asset('images/heart.svg')}}"></td>
                    <td class="text-center">{{$match[1]['name']}}</td>
                    <td class="text-center"> <i class="far fa-paper-plane share fa-2x" data-dismiss="modal" value="Decline"   data-toggle="modal"  data-target="#declineModalToStudent_{{$count}}"  onclick="setTextAreaToStudent('{{$match[1]['name']}}','{{$match[0]['title']}}','{{$match[0]['company']}}','{{$match[0]['id']}}','{{$match[1]['id']}}','{{Auth::user()->name}}','{{$count}}')"  ></i> </td>
                    <td class="text-center"><i class="fas fa-thermometer-{{$match[0]['message']}} fa-2x" ></i></td>
                    <td class="text-center"><div   style="display: inline" class="ui calendar" id="example_{{$count}}"><div class="ui input left icon"><i class="calendar icon"></i><input type="date" @if($match['interview_date'] !=null) style="border: none;background-color:rgba(125,224,135,0.1); padding:1rem" @endif value="{{$match['interview_date']}}" id="dateOfInterview_{{$count}}" placeholder="Date/Time" onfocusout="SaveTheDate('{{$match['matchId']}}','{{$count}}')"></div> </div></td>
                    @if($match['status'] == '0')
                    <td class="text-center"  style="color: rgba(240,20,60,0.7)"><i id="statusIcon_{{$count}}"  class="fas fa-times fa-2x" data-toggle="modal" data-target="#status_{{$count}}"></i></td>
                   @elseif($match['status'] == '1')
                        <td class="text-center"  style="color: rgba(50,240,80,0.7)"><i id="statusIcon_{{$count}}"  class="fas fa-check fa-2x" data-toggle="modal" data-target="#status_{{$count}}"></i></td>
                    @else
                        <td class="text-center"><i id="statusIcon_{{$count}}"  class="fas fa-edit fa-2x" data-toggle="modal" data-target="#status_{{$count}}"></i></td>
                    @endif
                        <div class="modal fade" id="status_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Update status</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                        <select class="form-control" id="statusSelect_{{$count}}" >
                                            <option selected="true" disabled="disabled" >--choose status--</option>
                                            <option value="0">Fails</option>
                                            <option value ="1">Succeeded</option>
                                        </select>
                                        <span style="font-size: .8rem;color: red;" id="errorStatus_{{$count}}"></span>
                                    </div>

                                    <div class="md-form mb-4">
                                        <i class="fas fa-pen-alt"></i>
                                        <label for="exampleFormControlTextarea1">add more info about this status</label>
                                        <span style="font-size: .9rem;display: block"  class="text-danger">*Optional</span>
                                        <textarea class="form-control"  id="statusMessage_{{$count}}" rows="3"></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer d-flex justify-content-center">

                                    <button  type="button" class="btn btn-success " data-dismiss="modal" aria-label="Close" aria-hidden="true"  onclick="updateStatus('{{$match['matchId']}}','{{$count}}')">Update Status</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="declineModalToStudent_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <h4 class="modal-title float-md-left" id="myModalLabel">Write notes to the Employer for  her ad</h4>
                              </div>
                              <div class="modal-body">
                                  <textarea id="errorMessageToStudent_{{$count}}" class="form-control"  rows="5" style="min-width: 100%"></textarea>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="sendMessageToStudent('{{$match[0]['id']}}','{{$match[1]['id']}}','{{$count}}')">send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="declineModalToEmployer_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                           <h4 class="modal-title float-md-left" id="myModalLabel">Write notes to the Employer for  her ad</h4>
                       </div>
                       <div class="modal-body">
                           <textarea id="errorMessageToEmployer_{{$count}}" class="form-control"  rows="5" style="min-width: 100%"></textarea>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="sendMessageToEmployer('{{$match[0]['user']['id']}}','{{$match[1]['id']}}','{{$match[0]['id']}}','{{$count}}')">send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script >

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName('td')[5];
                if (td || td2 || td3) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter)   > -1 || txtValue3.toUpperCase().indexOf(filter)   > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }



    </script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

    </body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{asset('js/placement.js')}}"></script>
@endsection
