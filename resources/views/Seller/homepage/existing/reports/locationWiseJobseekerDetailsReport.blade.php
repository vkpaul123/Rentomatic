@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')

<section class="content-header">
  <h1 id="reportTitle">LOCATION-WISE JOBSEEKER REPORT</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Jobseeker Report</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Details of Jobseekers</h3>

          <button class="btn btn-success pull-right" onclick="printReport()"><strong>Print Report</strong></button>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="report">
          @foreach ($addresses as $address)
          @if (count($addresses))
          <h4 class="text-warning">{{ $address->stateName }}</h4>
          <table id="example2-{{$loop->index}}" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th> {{-- firstname, lastname --}}
                <th>Gender</th>
                <th>Email</th>
                <th>Address</th>
                <th>Experience</th> {{-- type, category --}}
                <th>Skills</th>
                <th>Preffered job Category</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($jobseekers as $jobseeker)

              @if ($jobseeker->address_id->stateName == $address->stateName)
              <tr>
                <td>{{ $jobseeker->id }}</td>
                <td>{{ $jobseeker->firstname }} {{ $jobseeker->lastname }}</td>
                <td>{{ $jobseeker->gender }}</td>
                <td>{{ $jobseeker->tagline }}</td>
                <td>
                  @isset($jobseeker->address_id)
                  {{ $jobseeker->address_id->primaryPhoneNo }}, {{ $jobseeker->address_id->secondaryPhnoeNo }}, {{ $jobseeker->address_id->faxNo }} <br>
                  {{ $jobseeker->address_id->address }}, {{ $jobseeker->address_id->cityName }}, {{ $jobseeker->address_id->stateName }}-{{ $jobseeker->address_id->postalCode }}, {{ $jobseeker->address_id->countryName }}
                  @endisset

                </td>
                <td>{{$jobseeker->experience}}</td>
                <td>
                  @foreach ($jobseeker->languagesSpoken as $skill)
                  {{ $skill->skillName }} &nbsp &nbsp
                  @endforeach
                </td>
                <td>{{ $jobseeker->preferedJobCategoryId1 }}</td>

              </tr>
              @endif

              @endforeach
            </tbody>
          </table>
          <hr>
          <br><br>
          @else
          <h3 class="text-danger"><strong>No Addresses Found!</strong></h3>
          @endif
          @endforeach

        </div> 
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

          {{-- </div>
            <!-- /.box --> --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

      @endsection

      @section('extraPageSpecificLoadScriptsContent')

      <script src="{{ asset('assets/userPage/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('assets/userPage/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
      <!-- FastClick -->
      <script src="{{ asset('assets/userPage/bower_components/fastclick/lib/fastclick.js') }}"></script>

      <script>
        @foreach ($jobcategories as $jobcategory)
        $(function () {
          $('#example2-{{$loop->index}}').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
          })
        })
        @endforeach
      </script>

      <script type="text/javascript">
        function printReport()
        {
         var css = 'table{border-collapse:collapse;width:100%}td,th{padding:8px;text-align:left;border-bottom:1px solid #ddd}';
         var mywindow = window.open('', 'PRINT', 'height=400,width=600');

         mywindow.document.write('<html><head><title>' + document.title + ' - ' + document.getElementById('reportTitle').innerHTML + '</title>');
         mywindow.document.write('<style>' + css + '</style>');
         mywindow.document.write('</head><body >');
         mywindow.document.write(document.getElementById('report').innerHTML);
         mywindow.document.write('</body></html>');

	    mywindow.document.close(); // necessary for IE >= 10
	    mywindow.focus(); // necessary for IE >= 10*/

	    mywindow.print();
	    mywindow.close();

	    return true;
   }
 </script>

 @endsection