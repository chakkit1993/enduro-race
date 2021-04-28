<!-- @extends('front-end.master') -->

@extends('layouts.app')

@section('main-body')
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">Chiang Dao <br><span>Enduro</span> Challenge</h1>
      <p class="mb-4 pb-0">27 November 2020 ,  Chiang Dao ,Chiang Mai,Thailand</p>
      <a href="https://www.youtube.com/watch?v=rVu0zmCyy6E" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto">About The Event</a>
    </div>
  </section>

  <main id="main">
  <div class="row">
  <div class="col-lg-6">
  @include('front-end.home.leaderboard-table') 
</div>
  <div class="col-lg-6">
  @include('front-end.home.leaderboard-table') 
</div>
  </div>
  

</main>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
@endsection