<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Doi Chang Enduro Challenge</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
  
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/blink-text.css') }}" rel="stylesheet">
  <link href="{{ asset('css/badge-top-right.css') }}" rel="stylesheet">
  <link href="{{ asset('css/videos.css') }}" rel="stylesheet">
  
 
  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
<!--================Header Menu Area =================-->
@include('front-end.includes.header')
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
@yield('main-body')
<!--================ End Blog Area =================-->

<!--================ start footer Area  =================-->
@include('front-end.includes.footer')
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->


  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

<!-- <script src="{{asset('/front-end')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('/front-end')}}/js/popper.js"></script>
<script src="{{asset('/front-end')}}/js/bootstrap.min.js"></script>
<script src="{{asset('/front-end')}}/js/stellar.js"></script>
<script src="{{asset('/front-end')}}/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/isotope/isotope-min.js"></script>
<script src="{{asset('/front-end')}}/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('/front-end')}}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/counter-up/jquery.counterup.js"></script>
<script src="{{asset('/front-end')}}/js/mail-script.js"></script>
<script src="{{asset('/front-end')}}/js/theme.js"></script> -->


  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="js/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>



    <!-- Template Custom By Chakkit Javascript File -->

  <script src="/js/dataTableCustom.js"></script>


</body>

</html>
