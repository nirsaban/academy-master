@extends('masters.studentMaster')
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/personalQuistions.css') }}">
<div class="content">
    <div class="titre-content" style="margin-top: 100px">
        <div class="emp-header">
            <h1>First answer a few personal questions</h1>
        </div>
    </div>
    <section class="signup-step-container">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Q1</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Q2</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Q3</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Q4</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Q5</i></a>
                                </li>
                            </ul>
                        </div>


                            <div class="tab-content" id="main_form">
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <h3 class="text-center">Your level of credibility ? <span class = "reliability"></span></h3>
                                        <div class="tab-pane active" role="tabpanel">
                                            <div class="row text-center">
                                                <div class="row d-flex flex-column text-center col-md-6 buttons" data-group ="reliability">
                                                    <div style="background-color:  rgba(100,255,179,1) ;color:black " data-choose ="reliability_100%" class ="btn" onclick = chooseLavel(this)>Critical</div>
                                                    <div style="background-color:  rgba(100,255,179,.8);color:black " data-choose ="reliability_80%"  class ="btn" onclick = chooseLavel(this)>High</div>
                                                    <div style="background-color: rgba(100,255,179,0.6);color:black " data-choose ="reliability_60%"  class ="btn" onclick = chooseLavel(this)>Medium</div>
                                                    <div style="background-color: rgba(100,255,179,0.4);color:black " data-choose ="reliability_40%"  class ="btn" onclick = chooseLavel(this)>Low</div>
                                                    <div style="background-color: rgba(100,255,179,0.2);color:black " data-choose = "reliability_20%" class ="btn" onclick = chooseLavel(this)>Trivial</div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <h3 class="text-center">Your level of performance ? <span class = "performance"></span></h3>
                                    <div class="tab-pane active" role="tabpanel">
                                        <div class="row text-center">
                                            <div class="row d-flex flex-column text-center col-md-6 buttons"  data-group ="performance">
                                                <div style="background-color:  rgba(100,255,179,1) ;color:black  " data-choose ="performance_100%"class ="btn" onclick = chooseLavel(this)>Critical</div>
                                                <div style="background-color:  rgba(100,255,179,.8);color:black " data-choose ="performance_80%"  class ="btn" onclick = chooseLavel(this)>High</div>
                                                <div style="background-color: rgba(100,255,179,0.6);color:black " data-choose ="performance_60%"  class ="btn" onclick = chooseLavel(this)>Medium</div>
                                                <div style="background-color: rgba(100,255,179,0.4);color:black " data-choose ="performance_40%"  class ="btn" onclick = chooseLavel(this)>Low</div>
                                                <div style="background-color: rgba(100,255,179,0.2);color:black " data-choose = "performance_20%" class ="btn" onclick = chooseLavel(this)>Trivial</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <h3 class="text-center">The level of your social skills <span class ="social"></span></h3>
                                    <div class="tab-pane active" role="tabpanel">
                                        <div class="row text-center">
                                            <div class="row d-flex flex-column text-center col-md-6 buttons" data-group ="social">
                                                <div style="background-color:  rgba(100,255,179,1) ;color:black " data-choose ="social_100%"class ="btn" onclick = chooseLavel(this)>Critical</div>
                                                <div style="background-color:  rgba(100,255,179,.8);color:black " data-choose ="social_80%"  class ="btn" onclick = chooseLavel(this)>High</div>
                                                <div style="background-color: rgba(100,255,179,0.6);color:black " data-choose ="social_60%"  class ="btn" onclick = chooseLavel(this)>Medium</div>
                                                <div style="background-color: rgba(100,255,179,0.4);color:black " data-choose ="social_40%"  class ="btn" onclick = chooseLavel(this)>Low</div>
                                                <div style="background-color: rgba(100,255,179,0.2);color:black " data-choose = "social_20%" class ="btn" onclick = chooseLavel(this)>Trivial</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <h3 class="text-center" >Your ability to work under pressure ? <span class="pressure"></span></h3>
                                    <div class="tab-pane active" role="tabpanel">
                                        <div class="row text-center">
                                            <div class="row d-flex flex-column text-center col-md-6 buttons "  data-group ="pressure">
                                                <div style="background-color:  rgba(100,255,179,1) ;color:black  " data-choose ="pressure_100%"class ="btn" onclick = chooseLavel(this)>Critical</div>
                                                <div style="background-color:  rgba(100,255,179,.8);color:black " data-choose ="pressure_80%"  class ="btn" onclick = chooseLavel(this)>High</div>
                                                <div style="background-color: rgba(100,255,179,0.6);color:black " data-choose ="pressure_60%"  class ="btn" onclick = chooseLavel(this)>Medium</div>
                                                <div style="background-color: rgba(100,255,179,0.4);color:black " data-choose ="pressure_40%"  class ="btn" onclick = chooseLavel(this)>Low</div>
                                                <div style="background-color: rgba(100,255,179,0.2);color:black " data-choose = "pressure_20%" class ="btn" onclick = chooseLavel(this)>Trivial</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" role="tabpanel" id="step5">
                                    <h3 class="text-center">Your spatial vision level ? <span class="vision" ></span></h3>
                                    <div class="tab-pane active" role="tabpanel">
                                        <div class="row text-center">
                                            <div class="row d-flex flex-column text-center col-md-6 buttons" data-group ="vision">
                                                <div style="background-color:  rgba(100,255,179,1) ;color:black " data-choose ="vision_100%"class ="btn" onclick = chooseLavel(this)>Critical</div>
                                                <div style="background-color:  rgba(100,255,179,.8);color:black " data-choose ="vision_80%"  class ="btn" onclick = chooseLavel(this)>High</div>
                                                <div style="background-color: rgba(100,255,179,0.6);color:black " data-choose ="vision_60%"  class ="btn" onclick = chooseLavel(this)>Medium</div>
                                                <div style="background-color: rgba(100,255,179,0.4);color:black " data-choose ="vision_40%"  class ="btn" onclick = chooseLavel(this)>Low</div>
                                                <div style="background-color: rgba(100,255,179,0.2);color:black " data-choose = "vision_20%" class ="btn" onclick = chooseLavel(this)>Trivial</div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary" id="finish" onclick="submitQuistions()">Finish and Submit</button></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


    <script>



// ------------step-wizard-------------
$(document).ready(function () {

    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);

        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});



function nextTab(elem) {

    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});

var allLevels = {};
function chooseLavel(elem){
let thePart =  elem.dataset.choose.split('_')[0];
let allButtons = document.querySelectorAll(`.buttons[data-group=${thePart}] > div`);
allButtons.forEach(button =>{
    if(elem.dataset.choose == button.dataset.choose){
        button.classList += ' choosen'
    }else{
     if(button.classList.contains("choosen")){
        button.classList.remove("choosen");
     }

    }
})
let thePresent = elem.dataset.choose.split('_')[1];
document.querySelector(`.${thePart}`).innerHTML = elem.textContent + `(${thePresent})`
allLevels[thePart] = thePresent
console.log(allLevels)
}
function submitQuistions() {
     let url = location.origin + '/addPqStudent';
     console.log(allLevels)
    if(Object.keys(allLevels).length < 5){
        Swal.fire('Please Fill All input','','error')
    }else{
        axios({method:'post',url:url,data:{pq:allLevels,id:<?php echo Auth::id();?>}}).then(({data})=>{
            console.log(data)
        if(data == 'success'){
            location.reload()
        }else{
            Swal.fire({title: 'the course as been updated successfully', text: `${data}!`, icon: 'success', position: 'center'}).then(()=>{
                location.reload()
            });
        }

    })
    }
}


    </script>
@endsection
