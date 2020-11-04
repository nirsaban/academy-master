@extends('masters.employerMaster')
@section('content')

    <link rel="stylesheet" href="{{ URL::asset('css/homeEmployer.css') }}">
    <div class="container" style="margin-bottom: 8rem">
        <div class="header">
            <div class="mainTitle">Hello {{Auth::user()->name}}, {{$title}}</div>
            <h3 class="">{{$second_title}}-test</h3>
            @if(session()->has('message'))
                <div class="blur-out-expand-fwd">
                    {{ session()->get('message') }}
                </div>
            @endif
            <select class="form-control col-md-5 form-control-lg custom-select" id="sortJobs" onchange="sortJobs(this)">
                <option>show all jobs</option>
                @foreach($courses as $course)
                    <option value="{{$course['course_id']}}">{{$course['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
        <div id="jobsDiv"></div>
    </div>
    @if($newMatches)
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title float-lg-left">Well done {{Auth::user()->name}} </h4><i  style="padding-left:0.5rem; color: #1d643b" class="fas fa-check"></i>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="location.reload()">x</button>

                    </div>
                    <div class="modal-body" style="font-size: 1.1rem">
                        <?php $count = 0;?>
                        @foreach($newMatches as $match)
                            <?php $count ++;?>
                            <p>{{$count. '-' .$match['message']}}</p>

                        @endforeach            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Close</button>
                        <button type="button" onclick="confirmMessages('{{Auth::id()}}','matches')" class="btn btn-primary">confirm all messages</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif

        <script src="{{url('js/employer.js')}}"></script>
        <script>
            window.onload = function(){
              getData(courseId = null);

            }
            function getData(courseId = null){
                const baseUrl = location.origin;
                let url = location.origin + '/getJobs';
                axios({
                    method: 'post', url: url,
                    data: {
                        id: {{Auth::id()}},
                        courseId: courseId
                    }
                }).then(({data}) => {
                    if(courseId != null){
                    let allDiv = document.querySelectorAll('.JobsCard')
                        allDiv.forEach(divR => {
                            divR.parentNode.removeChild(divR);
                        })
                    }
                    data.forEach(item => {
                        console.log(item)
                        const csrfToken=  '<?php print_r(@csrf_token());?>';
                        let div = document.createElement('div')
                        div.classList ='JobsCard'

                        div.innerHTML +=  ` <div  class="card list-group-item-dark text-dark">`+
                            `<div class="card-body">`+
                            `<h1 class="card-title">${item.course["name"]}</h1>`+
                            `<h2 class="card-title">${item.category['cat_name']}</h2>`+
                            `<ul class="list-group">`+
                            ` <li class="list-group-item list-group-item-secondary "><i class="fas fa-heading"></i>  ${item.title}</li>`+
                            ` <li class="list-group-item list-group-item-secondary"><i class="fa fa-briefcase"style="font-size:20px;"></i> ${item.company}$</li>`+
                            `<li class="list-group-item list-group-item-secondary"><i class="fa fa-map-marker"style="font-size:20px;"></i>${item.location}</li>`+
                            ` <li class="list-group-item list-group-item-secondary des"><i class="fas fa-info"></i> ${item.description}</li>`+
                            `<li class="list-group-item list-group-item-secondary"><i class="fas fa-hand-holding-usd"></i> ${item.salary} </li>`+
                                 `</ul></div>`+
                                 ` <div class="card-footer">`+
                                  `<a href ="editJob/${item.id}/course/${item.course['id']}" type="button" class="btn" id="left-panel-link" >Edit </a>`+
                                 `<a href="job/delete/${item.id}"  type="button" class="btn button delete-confirm"data-toggle="modal" data-target="#exampleModal1" id="left-panel-link" onclick="deleteJob(this)" >Delete</a>`+
                                  `<form action="${baseUrl}/studentCategory" method="POST">`+
                                  `<input type="hidden" name="_token" value="${csrfToken}">`+
                                    `<input type="hidden"  name="job_id" value=${item.id}>`+
                                    `<input type="hidden" name="category_id" value="${item.category['id']}">`+
                                    `<input type="submit" class="btn" name="submit"  id="left-panel-link" value="All students">`+
                                  `</form>`+
                                 `</div>`+
                                  `</div>`
                                jobsDiv.appendChild(div)
                          })
                });

            }
            function sortJobs(data) {
                    getData(parseInt(data.value))
            }
            function deleteJob(data) {
                    const url = data.href

                    swal({
                        title: 'Are you sure delete this job?',
                        text: 'This record and it`s details will be permanantly deleted!',
                        icon: 'warning',
                        buttons: ["Cancel", "Yes!"],
                    }).then(function(value) {
                        if (value) {
                            axios({
                                method:'get',
                                url:url,
                            }).then(({data})=>{
                                swal({title: 'Shortlisted!',text: `${data}!`,icon: 'success'})
                                location.reload()
                            });

                        }else{
                            swal("Cancelled", "You dont deleted any post job:)", "error");
                        }
                    });
                }
        </script>
@endsection

