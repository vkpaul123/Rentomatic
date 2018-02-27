<header class="main-header">
  <!-- Logo -->
  <a href="{{ route('admin.home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><h2><strong>R</strong></h2><b><span style="color:gold;"></span></b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><h2><strong> Rentomatica </strong></h2></span>
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
    <img src="{{asset('assets/staticImages/user.png')}}" class="user-image" alt="User Image">
    <span class="hidden-xs"><strong>Admin - </strong>{{ Auth::user()->name }}</span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">
      <img src="{{asset('assets/staticImages/user.png')}}" class="img-circle" alt="User Image">

      <p>
        {{ Auth::user()->name }} - Admin
        <small>Member since {{ Auth::user()->created_at->diffForHumans() }}</small>
      </p>
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-right">
        <a href="{{ route('admin.logout') }}"
        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
        class="btn btn-default">
        Sign out
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
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