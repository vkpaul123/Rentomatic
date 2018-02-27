<aside class="main-sidebar" style="background-color: #384452;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('assets/staticImages/user.png')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active">
        <a href="{{ route('admin.home') }}">
          <i class="fa fa-home"></i> <span>Admin Home</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.adminlogs') }}">
          <i class="fa fa-sitemap"></i> <span>View logs</span>
        </a>
      </li>
      
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>