@extends('front-end.master-live')

@section('main-body')

<!--==========================
    Intro Section
  ============================-->
  <!-- <section id="intro">
  <div class="intro-container wow fadeIn">
    <h1 class="mb-4 pb-0">Chiang Dao <br><span>Enduro</span> Challenge</h1>
    <p class="mb-4 pb-0">27 November 2020 , Chiang Dao ,Chiang Mai,Thailand</p>
    <a href="https://www.youtube.com/watch?v=rVu0zmCyy6E" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
    <a href="#about" class="about-btn scrollto">About The Event</a>
  </div>
</section> -->

<div style="height: 80px ; background:rgba(6, 12, 34, 0.98);"></div>

  <div style="height: 80px;"></div>
  <section id="live" class="section-with-bg wow fadeInUp">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=560368181293170&autoLogAppEvents=1" nonce="YlJHZFSJ"></script>

    <div class="container">

    


      <div class="row">
        <div class="col-lg-2 col-md-6"></div>
        <div class="col-lg-8 col-md-6 ">
        @if(isset($live))
          <iframe src='{{$live->src}}' width="100%" height="480" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
  
        @else
        <iframe src='https://www.youtube.com/embed/drrnaW7Jm5Y' width="100%" height="480" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
        @endif
        
    
        </div>
        <div class="col-lg-2 col-md-6"></div>
      </div>

    </div>

  </section>


  <!--==========================
      Sponsors Section
    ============================-->
    <section id="supporters" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Sponsors</h2>
        </div>

        <div class="row no-gutters supporters-wrap clearfix">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="images/supporters/1.jpg" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="images/supporters/2.jpg" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="images/supporters/3.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="images/supporters/4.jpg" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section>


<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

@endsection

