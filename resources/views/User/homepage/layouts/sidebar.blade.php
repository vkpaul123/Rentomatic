<aside class="main-sidebar" style="background-color: #384452;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
          @isset(Auth::user()->photo)
            <img src="{{Auth::user()->photo}}" height="160px" width="160px" class="img-circle" alt="User Image">
          @else
            <img src="{{ asset('assets/staticImages/user.png') }}" height="160px" width="160px" class="img-circle" alt="User Image">
          @endisset
      </div>
      <div class="pull-left info">
        <p><a href="/home" style="color: white;">{{ Auth::user()->name }}</a></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"><strong>MAIN NAVIGATION</strong></li>
      <li class="active"><a href="/home"><i class="fa fa-home text-default"></i> <span>Home</span></a></li>
      <li><a href="/home/propertySearch"><i class="fa fa-home text-default"></i> <span>Property Search</span></a></li>
      <li><a href="/home/myMeetings"><i class="fa fa-home text-default"></i> <span>My Property Requests</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>