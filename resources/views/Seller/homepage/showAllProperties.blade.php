@extends('Seller.homepage.layouts.app')
@section('title', 'Sellers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Seller</b> </span> View Job Applications
		<small>all questions in questionnare</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View Job Applications</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
      <div class="container-fluid">
        <div class="row">
         <h3>
          <strong class="text-warning">My Properties</strong>
         <a href="{{ route('property.create') }}" class="btn btn-warning pull-right"><strong>Add Property To-Let</strong></a>
        </h3>
       </div>
     </div>
   </div>
   <div class="box-body table-responsive">
     <table id="questionnare" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th><span class="text-warning">Sr No</span></th>
          <th><span class="text-warning">Type</span></th>
          <th><span class="text-warning">Address</span></th>
          <th><span class="text-warning">Price</span></th>
          <th><span class="text-warning">Status</span></th>
          <th><span class="text-warning">Options</span></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($properties as $property)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $property->propertyType }}</td>
            <td>{{ $property->addressText }}, {{ $property->locality }}, {{ $property->landmark1 }}, {{ $property->landmark2 }}, {{ $property->street }}, {{ $property->district }}, {{ $property->city }} , {{ $property->state }}, {{ $property->pincode }}</td>
            <td>{{ $property->price }}</td>
            <td>{{ $property->sold }}</td>
            <td>
              <a href="">View</a> &nbsp | &nbsp
              <a href="">Delete</a>
            </td>

          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th><span class="text-warning">Sr No</span></th>
          <th><span class="text-warning">Type</span></th>
          <th><span class="text-warning">Address</span></th>
          <th><span class="text-warning">Price</span></th>
          <th><span class="text-warning">Status</span></th>
          <th><span class="text-warning">Options</span></th>
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