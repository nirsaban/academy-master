@extends('masters.studentMaster')
@section('content')
<?php
 if($profile['links'] !== NULL){
     $linksArr = json_decode($profile['links']);

foreach ($linksArr as $key => $value) {
    if($key == '1_1'){
        $img1_1 = $value;
    }elseif($key == '1_2'){
        $img1_2 = $value;
    }elseif($key == '1_3'){
        $img1_3 = $value;
    }elseif($key == '2_1'){
        $img2_1 = $value;
    }elseif($key == '2_2'){
        $img2_2 = $value;
    }elseif($key == '2_3'){
        $img2_3 = $value;
    }elseif($key == '3_1'){
        $img3_1 = $value;
    }elseif($key == '3_2'){
        $img3_2 = $value;
    }elseif($key == '3_3'){
        $img3_3 = $value;
    }
    elseif($key == 'title_1'){
        $title_1 = $value;
    }elseif($key == 'title_2'){
        $title_2 = $value;
    }elseif($key == 'title_3'){
        $title_3 = $value;
    }elseif($key == 'des_3'){
        $des_3 = $value;
    }elseif($key == 'des_2'){
        $des_2 = $value;
    }elseif($key == 'des_1'){
        $des_1 = $value;
    }

}
}



?>
<style>
    .content {
        width: 100%;
        max-width: 100%;
        margin: 0 !important;
        padding: 0 !important;
    }
    p,h1{
        width:25rem !important;
        word-wrap: break-word;
    }
    @media only screen and (max-width: 600px) {
    body {
   font-size: 15px !important;
     p,h1{
        width:18rem !important;
        word-wrap: break-word;
    }
    h1{
        font-size: 20px;

    }
    .masthead-heading{font-size: 22px !important;}
    }

}

</style>
<div style="margin-bottom: 5rem !important"   class="container-fluid mb-lg-5">
    <div class="row"></div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{ URL::asset('css/portfolio.css') }}">

<div class="content">


<form style="display: none" action="{{route('addPhoto')}}" method="post" enctype="multipart/form-data" id = "form">
    @csrf
    <input type="file" id="file" style = "display:none" name ="file">
    <input type="hidden" id="the_position" name ="position">

    </form>

    @if($errors->any())
    <script>Swal.fire("{{$errors->first()}}", "sorry :)", "error")</script>
   @endif

    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="" />
            <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0" >{{Auth::user()->name}} Portfolio</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">{{strtoupper($course[0]['course']['name'])}} - {{strtoupper($profile['category']['cat_name'])}} </p>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container mb-4">
        <input type="text" class="form-control mb-3" id="title_1"  @if(isset($title_1)) value = " {{$title_1}}" @endif  placeholder="Enter first title" onblur = "saveInput(1,'title',this.value)">
        <h1 class="title_1" style="display:none"></h1>
            <div>
              <div class="row ">
                <div class="col-md-7">
                <textarea class="form-control"   id="des_1" rows="9" placeholder="Write description..." onblur = "saveInput(1,'des',this.value)"> @if(isset($des_1)) {{$des_1}} @endif </textarea>
                    <p class="des_1" class="text-justify"></p>
                </div>
                  <div class="col-md-5">
                  <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                      <li data-target="#CarouselTest" data-slide-to="1"></li>
                      <li data-target="#CarouselTest" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block" @if(isset($img1_1)) src="{{asset('imagesPort/_'.Auth::id().'/1_1'.$img1_1)}}" @else src="{{asset('images/add.png')}}" @endif width="450" height="300"  id = "1_1" onclick="addPhoto(1,1)">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block"  @if(isset($img1_2)) src="{{asset('imagesPort/_'.Auth::id().'/1_2'.$img1_2)}}" @else src="{{asset('images/add.png')}}" @endif width="450" height="300" id = "1_2" onclick="addPhoto(1,2)">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block" @if(isset($img1_3)) src="{{asset('imagesPort/_'.Auth::id().'/1_3'.$img1_3)}}" @else src="{{asset('images/add.png')}}" @endif width="450" height="300"  id = "1_1"  onclick="addPhoto(1,3)">
                      </div>
                      <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                      <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
       <div class="container mb-4">
            <input type="text" class="form-control mb-3" id="title_2"  @if(isset($title_2)) value = " {{$title_2}}" @endif placeholder="Enter second title" onblur = "saveInput(2,'title',this.value)" >
               <h1 class="title_2" style="display:none"></h1>
                <div>
                  <div class="row ">
                    <div class="col-md-7">
                        <textarea class="form-control" id="des_2" rows="9" placeholder="Write description..." onblur = "saveInput(2,'des',this.value)"> @if(isset($des_2)) {{$des_2}} @endif</textarea>
                        <p class="des_2"></p>
                     </div>
                      <div class="col-md-5">
                      <div id="CarouselTest1" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                          <li data-target="#CarouselTest" data-slide-to="1"></li>
                          <li data-target="#CarouselTest" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block" class="d-block" @if(isset($img2_1)) src="{{asset('imagesPort/_'.Auth::id().'/2_1'.$img2_1)}}" @else src="{{asset('images/add.png')}}" @endif width="450" height="300" id ="2_1 " alt="" onclick="addPhoto(2,1)">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block" class="d-block" @if(isset($img2_2)) src="{{asset('imagesPort/_'.Auth::id().'/2_2'.$img2_2)}}" @else src="{{asset('images/add.png')}}" @endif width="450" height="300" id ="2_2 "alt="" onclick="addPhoto(2,2)">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block" class="d-block" @if(isset($img2_3)) src="{{asset('imagesPort/_'.Auth::id().'/2_3'.$img2_3)}}" @else src="{{asset('images/add.png')}}" @endif width="450" height="300" id ="2_3 "alt="" onclick="addPhoto(2,3)">
                          </div>
                          <a class="carousel-control-prev" href="#CarouselTest1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                          <a class="carousel-control-next" href="#CarouselTest1" role="button" data-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="container mb-4">
                <input type="text" class="form-control mb-3" id="title_3" @if(isset($title_3)) value = "{{$title_3}}" @endif placeholder="Enter third title" onblur = "saveInput(3,'title',this.value)">
                <h1 class="title_3" style="display:none"></h1>
                    <div>
                      <div class="row ">
                        <div class="col-md-7">
                            <textarea class="form-control" id="des_3" rows="9" placeholder="Write description..." onblur = "saveInput(3,'des',this.value)" >@if(isset($des_3)) {{$des_3}} @endif</textarea>
                            <p class="des_3"></p>
                        </div>
                          <div class="col-md-5">
                          <div id="CarouselTest2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                              <li data-target="#CarouselTest" data-slide-to="1"></li>
                              <li data-target="#CarouselTest" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block" class="d-block" @if(isset($img3_1)) src="{{asset('imagesPort/_'.Auth::id().'/3_1'.$img3_1)}}" @else src="{{asset('images/add.png')}}" @endif width="450" height="300"   alt="" onclick="addPhoto(3,1)">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block" class="d-block" @if(isset($img3_2)) src="{{asset('imagesPort/_'.Auth::id().'/3_2'.$img3_2)}}" @else src="{{asset('images/add.png')}}" @endif width="450" height="300"  alt="" onclick="addPhoto(3,2)">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block" class="d-block" @if(isset($img3_3)) src="{{asset('imagesPort/_'.Auth::id().'/3_3'.$img3_3)}}" @else src="{{asset('images/add.png')}}" @endif width="450" height="300"  alt="" onclick="addPhoto(3,3)">
                              </div>
                              <a class="carousel-control-prev" href="#CarouselTest2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                              <a class="carousel-control-next" href="#CarouselTest2" role="button" data-slide="next">
                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="col-lg-12 text-center">
                        <button  class="btn btn-success"  onclick="livedemo('{{Auth::id()}}')"  > LIVE DEMO </button>
                        <button  class="btn btn-primary"  onclick="location.reload()"  > RETURN TO EDIT </button>
                        <button  class="btn btn-primary"  onclick="resetAll('{{Auth::id()}}')"  >RESET ALL</button>

                    </div>
                </div>
    </section>
    <!-- About Section-->

    <!-- Contact Section-->

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        2215 John Daniel Drive
                        <br />
                        Clark, MO 65243
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Freelancer</h4>
                    <p class="lead mb-0">
                        Freelance is a free to use, MIT licensed Bootstrap theme created by
                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                        .
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Your Website 2020</small></div>
    </div>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- Portfolio Modals-->
    <!-- Portfolio Modal 1-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label">Log Cabin</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cabin.png" alt="" />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 2-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal2Label">Tasty Cake</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cake.png" alt="" />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="{{asset('js/portfolio.js')}}"></script>
@endsection
