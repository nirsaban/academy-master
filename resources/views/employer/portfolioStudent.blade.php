@extends("masters.$theMaster")
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
    p,h3{
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
            <!-- Masthead Subheading-->@if(isset($profile['category']['cat_name']))
            <p class="masthead-subheading font-weight-light mb-0">{{strtoupper($course[0]['course']['name'])}} - {{strtoupper($profile['category']['cat_name'])}} </p>
           @else
           <p class="masthead-subheading font-weight-light mb-0">{{strtoupper($course[0]['course']['name'])}}  </p>
           @endif
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container mb-4">

        <h3 class="title_1" >@if(isset($title_1)) {{$title_1}} @endif</h3>
            <div>
              <div class="row ">
                <div class="col-md-7">
                    <p class="des_1" class="text-justify"> @if(isset($des_1)) {{$des_1}} @endif</p>
                </div>
                  <div class="col-md-5">
                  <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                      <li data-target="#CarouselTest" data-slide-to="1"></li>
                      <li data-target="#CarouselTest" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @if(isset($img1_1))
                      <div class="carousel-item active">
                        <img class="d-block"  src="{{asset('imagesPort/_'.$id.'/1_1'.$img1_1)}}"   width="450" height="300"  id = "1_1" >
                      </div>
                      @endif
                      @if(isset($img1_2))
                      <div class="carousel-item">
                        <img class="d-block"   src="{{asset('imagesPort/_'.$id.'/1_2'.$img1_2)}}" width="450" height="300" id = "1_2" >
                      </div>
                      @endif
                      @if(isset($img1_3))
                      <div class="carousel-item">
                        <img class="d-block"  src="{{asset('imagesPort/_'.$id.'/1_3'.$img1_3)}}"  width="450" height="300"  id = "1_1" >
                      </div>
                      @endif
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
               <h3 class="title_2"> @if(isset($title_2))  {{$title_2}}" @endif </h3>
                <div>
                  <div class="row ">
                    <div class="col-md-7">
                        <p class="des_2">@if(isset($des_2)) {{$des_2}} @endif</p>
                     </div>
                      <div class="col-md-5">
                      <div id="CarouselTest1" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                          <li data-target="#CarouselTest" data-slide-to="1"></li>
                          <li data-target="#CarouselTest" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @if(isset($img2_1))
                          <div class="carousel-item active">
                            <img class="d-block" class="d-block"  src="{{asset('imagesPort/_'.$id.'/2_1'.$img2_1)}}"   width="450" height="300" id ="2_1 " alt="">
                          </div>
                          @endif
                          @if(isset($img2_2))
                          <div class="carousel-item">
                            <img class="d-block" class="d-block"  src="{{asset('imagesPort/_'.$id.'/2_2'.$img2_2)}}"  width="450" height="300" id ="2_2 "alt="" >
                          </div>
                          @endif
                          @if(isset($img2_3))
                          <div class="carousel-item">
                            <img class="d-block" class="d-block"  src="{{asset('imagesPort/_'.$id.'/2_3'.$img2_3)}}"  width="450" height="300" id ="2_3 "alt="" >
                          </div>
                          @endif
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

                <h3 class="title_3">@if(isset($title_3)) {{$title_3}} @endif</h3>
                    <div>
                      <div class="row ">
                        <div class="col-md-7">

                            <p class="des_3">@if(isset($des_3)) {{$des_3}} @endif</p>
                        </div>
                          <div class="col-md-5">
                          <div id="CarouselTest2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                              <li data-target="#CarouselTest" data-slide-to="1"></li>
                              <li data-target="#CarouselTest" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @if(isset($img3_1))
                              <div class="carousel-item active">
                                <img class="d-block" class="d-block"  src="{{asset('imagesPort/_'.$id.'/3_1'.$img3_1)}}"  width="450" height="300"   alt="" >
                              </div>
                              @endif
                              @if(isset($img3_2))
                              <div class="carousel-item">
                                <img class="d-block" class="d-block"  src="{{asset('imagesPort/_'.$id.'/3_2'.$img3_2)}}"   width="450" height="300"  alt="" >
                              </div>
                              @endif
                              @if(isset($img3_3))
                              <div class="carousel-item">
                                <img class="d-block" class="d-block"  src="{{asset('imagesPort/_'.$id.'/3_3'.$img3_3)}}"   width="450" height="300"  alt="" >
                              </div>
                              @endif
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
                    <h4 class="text-uppercase mb-4">AcademyJob</h4>
                    <p class="lead mb-0">
                        Nir Web Systems Development
                        <br />
                        Israel, Tel Aviv
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
                    <h4 class="text-uppercase mb-4">Portfolio For Students</h4>
                    <p class="lead mb-0">
                        Manage Your Skills
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © AcademyJob 2020</small></div>
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
