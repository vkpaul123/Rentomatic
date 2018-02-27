@extends('Admin.homepage.layouts.app')
@section('title', 'Admin')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span class="text-danger"><b>Admin</b> </span>  
		<small>User data</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">User data</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
      <div class="container-fluid">
        <div class="row">
         {{-- <h3>
          <strong class="text-info">Buyers</strong>
         <a href="{{ route('property.create') }}" class="btn btn-danger pull-right"><strong>Add Property To-Let</strong></a>
        </h3>
 --}}       </div>
     </div>
   </div>
   <div class="box-body table-responsive">
     <table id="questionnare" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th><span class="text-danger">User Id</span></th>
          <th><span class="text-danger">User Type</span></th>
          <th><span class="text-danger">Login time</span></th>
          <th><span class="text-danger">IP address</span></th>
        </tr>
      </thead>

      <tbody>
        @foreach ($adminlogs as $adminlog)
          <tr>
            <td>{{ $adminlog->user_id }}</td>
            <td>{{ $adminlog->user_type }}</td>
            <td>{{ $adminlog->created_at }}</td>
            <td>{{ $adminlog->ip_address }}</td>
          </tr>
        @endforeach
      </tbody>

      <tfoot>
        <tr>
          <th><span class="text-danger">User Id</span></th>
          <th><span class="text-danger">User Type</span></th>
          <th><span class="text-danger">Login time</span></th>
          <th><span class="text-danger">IP address</span></th>
        </tr>
      </tfoot>

    </table>
  </div>
</div>
<!-- /.box -->

</section>
<!-- /.content -->

@endsection

@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/userPage/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/userPage/bower_components/fastclick/lib/fastclick.js') }}"></script>

<script>
  $(function () {
    $('#questionnare').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

{{-- @foreach ($jobApplications as $jobApplication)
  <script>
    function approveApp{{ $jobApplication->id }}() {
      event.preventDefault();
      document.getElementById('applicationStatus[{{ $jobApplication->id }}]').value = "Approved";
      document.getElementById('mailBody1[{{ $jobApplication->id }}]').value = "This Mail is regarding your Job Application for the vacancy in {{ Auth::user()->companyname }}. The Employer has Approved your Application. Please Contact the employer for further details.";
    }

    function rejectApp{{ $jobApplication->id }}() {
      event.preventDefault();
      document.getElementById('applicationStatus[{{ $jobApplication->id }}]').value = "Rejected";
      document.getElementById('mailBody1[{{ $jobApplication->id }}]').value = "This Mail is regarding your Job Application for the vacancy in {{ Auth::user()->companyname }}. The Employer has Rejected your Application. Please Contact the employer for further details.";
    }
  </script>
@endforeach --}}

@endsection