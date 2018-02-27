<aside class="main-sidebar" style="background-color: #384452;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        @isset(Auth::user()->photo)
          <img style="background-color: white;" src="{{Auth::user()->photo}}" height="160px" width="160px" class="img-circle" alt="User Image">
        @else
          <img src="{{ asset('assets/staticImages/user.png') }}" height="160px" width="160px" class="img-circle" alt="User Image">
        @endisset
      </div>
      <div class="pull-left info">
        <p><a href="/employer/home" style="color: white;">{{ Auth::user()->name }}</a></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active"><a href="/seller/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
      <li><a href="/seller/property"><i class="fa fa-building"></i> <span>My Properties</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>