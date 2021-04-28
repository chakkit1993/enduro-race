 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Website</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/images/astronaut.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                       <a href="{{route('home')}}" class="d-block">  {{ Auth::user()->name }}</a>
                    @else
                    <script>window.location = "/home";</script>
                    @endauth
                </div>
        @endif
       
        </div>
      </div>

 
   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a  href="{{route('home')}}" class="nav-link">
          
              <i class="nav-icon fas fa-arrow-left"></i>
              
              <p>Home</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a  href="{{route('home')}}" class="nav-link">
          
              <i class="nav-icon fas fa-user"></i>
              <p>Profile</p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="{{route('tournaments.show',$tournament->id)}}"class="nav-link">
              <i class="nav-icon fas fa-house-user"></i>
          <p>Information</p>
              
            </a>
          </li>
          <!-- <li class="nav-item">
            <a  href="{{route('divisions.index')}}"class="nav-link">
            <i class="nav-icon fas fa-motorcycle"></i>
            <p>Divison</p>
              
        
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a  href="{{route('players.index')}}"class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
          
            <p>Players</p>
              
        
            </a>
          </li> -->

          <li class="nav-item">
            <a  href="{{route('tournaments.leaderboards' ,$tournament->id)}}"class="nav-link">
           <i class="nav-icon  fas fa-bullhorn"></i>
            <p>Laederboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a  href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
             </form>



          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>