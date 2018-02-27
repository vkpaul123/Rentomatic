@extends('Seller.homepage.layouts.app')
@section('title', 'Sellers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Seller</b> </span> View Buyers 
		<small>Buyers from around the world</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View Buyers</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		
   <div class="box-body table-responsive">
   @if (Session::has('messageFail'))
        <div class="alert alert-danger">{!! Session::get('messageFail') !!}
          <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
        </div>
      @endif
      @if (Session::has('messageSuccess'))
        <div class="alert alert-success">{!! Session::get('messageSuccess') !!}
          <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
        </div>
      @endif
     <table id="questionnare" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th><span class="text-warning">Sr No</span></th>
          <th><span class="text-warning">Name</span></th>
          <th><span class="text-warning">Contact</span></th>
          <th><span class="text-warning">Status</span></th>
          <th><span class="text-warning">Options</span></th>
        </tr>
      </thead>

      <tbody>
        @foreach ($meetings as $meeting)
          {{-- expr --}}
        <tr> 
          <td>{{ $loop->iteration }}</td>
          <td>{{ $meeting->user_id->name }}</td>
          <td><b>{{ $meeting->user_id->phno }}</b><br><a href="mailto:{{ $meeting->user_id->email }}">{{ $meeting->user_id->email }}</a></td>
          <td>{{ $meeting->status }}</td>
          <td>
            @if($meeting->status == "sold")

            <a href="" onclick="revoke{{ $meeting->id }}(); document.getElementById('setApplicationStatus-{{ $meeting->id }}').submit();">Revoke</a>

            @elseif ($meeting->status == "pending")

            <a href="" onclick="approveApp{{ $meeting->id }}(); document.getElementById('setApplicationStatus-{{ $meeting->id }}').submit();">Approve</a> &nbsp | &nbsp
            <a href="" onclick="closeApp{{ $meeting->id }}(); document.getElementById('setApplicationStatus-{{ $meeting->id }}').submit();">Close</a>
            
            @elseif ($meeting->status == "allowed access to contacts")
            <a href="" onclick="closeApp{{ $meeting->id }}(); document.getElementById('setApplicationStatus-{{ $meeting->id }}').submit();">Close</a> &nbsp | &nbsp
            <a href="" onclick="sell{{ $meeting->id }}(); document.getElementById('setApplicationStatus-{{ $meeting->id }}').submit();">Sell</a>

            @else
              -
            @endif
            <form action="{{ route('set.request.status', $meeting->id) }}" style="display: none;" id="setApplicationStatus-{{ $meeting->id }}" method="post">
              {{ csrf_field() }} {{ method_field('PUT') }}
              <input type="hidden" name="applicationStatus[{{ $meeting->id }}]" id="applicationStatus[{{ $meeting->id }}]" value="">
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>

      <tfoot>
        <tr>
          <th><span class="text-warning">Sr No</span></th>
          <th><span class="text-warning">Name</span></th>
          <th><span class="text-warning">Contact</span></th>
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

@foreach ($meetings as $meeting)
  <script>
    function approveApp{{ $meeting->id }}() {
      event.preventDefault();
      document.getElementById('applicationStatus[{{ $meeting->id }}]').value = "allowed access to contacts";
    }

    function closeApp{{ $meeting->id }}() {
      event.preventDefault();
      document.getElementById('applicationStatus[{{ $meeting->id }}]').value = "closed";
    }

    function sell{{ $meeting->id }}() {
      event.preventDefault();
      document.getElementById('applicationStatus[{{ $meeting->id }}]').value = "sold";
    }

    function revoke{{ $meeting->id }}() {
      event.preventDefault();
      document.getElementById('applicationStatus[{{ $meeting->id }}]').value = "revoked";
    }

  </script>
@endforeach

@endsection