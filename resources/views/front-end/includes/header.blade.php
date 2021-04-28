<!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1> -->
        <!-- <a href="#intro" class="scrollto"><img src="images/logo1.png" alt="" title=""></a> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About</a></li>
          <!-- <li><a href="#speakers">Speakers</a></li> -->
          <!-- <li><a href="#schedule">Schedule</a></li> -->
          <!-- <li><a href="#venue">Venue</a></li> -->
          <li><a href="#gallery">Gallery</a></li>
      
          <li><a href="#supporters">Sponsors</a></li>

          <!-- <li><a href="#contact">Contact</a></li> -->
          <li><a href="{{ route('live-online.index') }}">Live Score</a></li>
        @if (Route::has('login'))
               
            @auth
            <li class="buy-tickets"><a href="{{ route('home') }}">{{ Auth::user()->name }}</a></li>
            @else
            <li class="buy-tickets"><a href="{{ route('login') }}">Login</a></li>

            @endauth
              
        @endif


         
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
