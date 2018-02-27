<header class="main-header">
  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><h2><strong>R</strong></h2></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">{{-- <img src="{{asset('assets/staticImages/Logos/Logo_Nav.png')}}" alt="Logo_Nav.png" width="175"> --}}<h2><strong>Rentomatica</strong></h2></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @isset(Auth::user()->photo)
            <img src="{{Auth::user()->photo}}" height="160px" width="160px" class="user-image" alt="User Image">
            @else
            <img src="{{asset('assets/staticImages/user.png')}}" height="160px" width="160px" class="user-image" alt="User Image">
            @endisset
            <span class="hidden-xs">{{-- {{ Auth::user()->firstname.' '.Auth::user()->lastname }} --}}{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              
              @isset(Auth::user()->photo)
              <img src="{{Auth::user()->photo}}" height="160px" width="160px" class="img-circle" alt="User Image">
              @else
              <img src="{{asset('assets/staticImages/user.png')}}" height="160px" width="160px" class="img-circle" alt="User Image">
              @endisset
              
              <p>
                <a href="{{-- {{ route('profilePic.upload', Auth::user()->id ) }} --}}"><button class="btn btn-default btn-xs">Change Picture</button></a>
                {{--  {{Auth::user()->name}} --}}
                <small style="padding-top: 10px;">Member Since {{ Auth::user()->created_at->diffForHumans() }}</small>
              </p>
            </li>
            <!-- Menu Body -->
            
            <!-- Menu Footer-->
            <li class="user-footer">
              
              <div class="pull-right">
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                class="btn btn-default">
                Sign out
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
</header>