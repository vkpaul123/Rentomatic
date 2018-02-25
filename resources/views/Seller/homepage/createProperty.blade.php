@extends('Seller.homepage.layouts.app')
@section('title', 'Sellers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{asset('assets/userPage/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/userPage/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

<style type="text/css">
[class^='select2'] {
	border-radius: 0px !important;
}

.select2-container {
	padding: 0px;
	border-width: 0px;
}
.select2-container .select2-choice {
	height: 38px;
	line-height: 38px;
}

.select2-container.form-control {
	height: auto !important;
}

.form-control{
	-webkit-appearance:none;
	-moz-appearance: none;
	-ms-appearance: none;
	-o-appearance: none;
	appearance: none;
}
</style>
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Seller</b> </span> Create Property To-Let
		<small>Open an advertizement for your property</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Open Vacancy</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Job Vacancy</b></h3>
		</div>

		<div class="box-body">
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
			@if(count($errors) > 0)
			<center>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
					<strong>
						You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
					</strong>
					<hr>
					@foreach ($errors->all() as $error)
					{{ $error }} <br>
					@endforeach
				</div>
			</center>
			@endif

			<form action="{{ route('property.store') }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				
				<h4><span style="color: #e08e0b;">General Details</span></h4>

				<div class="form-group{{ $errors->has('propertyType') ? ' has-error' : '' }}">
					<label for="propertyType" class="col-md-3 control-label">Property Type<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="propertyType" name="propertyType">
							<option value="">Choose an industry…</option>
							<option value="1BHK">1BHK</option>
							<option value="2BHK">2BHK</option>
							<option value="3BHK">3BHK</option>
							<option value="Studio Apt">Studio Apt</option>

						</select>	
					</div>
				</div>		

				<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
					<label for="price" class="col-md-3 control-label">Price<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="price" name="price" placeholder="Prefered Experience" min="0" value="{{ old('price') }}">
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Upload Photos</span></h4>

				<div class="form-group{{ $errors->has('photo1') ? ' has-error' : '' }}">
					<label for="photo1" class="col-md-3 control-label">Photo 1</label>
					<div class="col-md-6">
						<input type="file" maxlength="2" class="form-control pull-right" id="photo1" name="photo1" placeholder="Prefered Experience" min="0" value="{{ old('photo1') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('photo2') ? ' has-error' : '' }}">
					<label for="photo2" class="col-md-3 control-label">Photo 2</label>
					<div class="col-md-6">
						<input type="file" maxlength="2" class="form-control pull-right" id="photo2" name="photo2" placeholder="Prefered Experience" min="0" value="{{ old('photo2') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('photo3') ? ' has-error' : '' }}">
					<label for="photo3" class="col-md-3 control-label">Photo 3</label>
					<div class="col-md-6">
						<input type="file" maxlength="2" class="form-control pull-right" id="photo3" name="photo3" placeholder="Prefered Experience" min="0" value="{{ old('photo3') }}">
					</div>
				</div>	

				<hr>
				<h4><span style="color: #e08e0b;">Property Highlights</span></h4>

				<div class="form-group{{ $errors->has('highlights') ? ' has-error' : '' }}">
					<label for="highlights" class="col-md-3 control-label">Job Description<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="highlights" name="highlights" placeholder="Job Description" rows="5">{{ old('highlights') }}</textarea>
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Property Address</span></h4>

				<div class="form-group{{ $errors->has('addressText') ? ' has-error' : '' }}">
					<label for="addressText" class="col-md-3 control-label">Address<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="addressText" name="addressText" placeholder="Job Description" rows="5">{{ old('addressText') }}</textarea>
					</div>
				</div>

				<div class="form-group{{ $errors->has('locality') ? ' has-error' : '' }}">
					<label for="locality" class="col-md-3 control-label">Locality<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="locality" name="locality" placeholder="Prefered Experience" min="0" value="{{ old('locality') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark1') ? ' has-error' : '' }}">
					<label for="landmark1" class="col-md-3 control-label">Landmark 1<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="landmark1" name="landmark1" placeholder="Prefered Experience" min="0" value="{{ old('landmark1') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark2') ? ' has-error' : '' }}">
					<label for="landmark2" class="col-md-3 control-label">Landmark 2<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="landmark2" name="landmark2" placeholder="Prefered Experience" min="0" value="{{ old('landmark2') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark2') ? ' has-error' : '' }}">
					<label for="landmark2" class="col-md-3 control-label">Street<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="landmark2" name="landmark2" placeholder="Prefered Experience" min="0" value="{{ old('landmark2') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark2') ? ' has-error' : '' }}">
					<label for="landmark2" class="col-md-3 control-label">District<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="landmark2" name="landmark2" placeholder="Prefered Experience" min="0" value="{{ old('landmark2') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark2') ? ' has-error' : '' }}">
					<label for="landmark2" class="col-md-3 control-label">City<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="landmark2" name="landmark2" placeholder="Prefered Experience" min="0" value="{{ old('landmark2') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark2') ? ' has-error' : '' }}">
					<label for="landmark2" class="col-md-3 control-label">State<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="landmark2" name="landmark2" placeholder="Prefered Experience" min="0" value="{{ old('landmark2') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark2') ? ' has-error' : '' }}">
					<label for="landmark2" class="col-md-3 control-label">Pincode<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="landmark2" name="landmark2" placeholder="Prefered Experience" min="0" value="{{ old('landmark2') }}">
					</div>
				</div>

				

				<hr>
				<h4><span style="color: #e08e0b;">Screening Test</span></h4>
				
				<div class="form-group{{ $errors->has('landmark2') ? ' has-error' : '' }}">
					<label for="landmark2" class="col-md-3 control-label">Status<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="landmark2" name="landmark2" placeholder="Prefered Experience" min="0" value="{{ old('landmark2') }}" disabled>
					</div>
				</div>


				

				<hr>
				<input type="hidden" name="id" value="{{ Auth::user()->id }}">
				<div class="form-group{{ $errors->has('remember') ? ' has-error' : '' }}">
					<div class="col-xs-10 col-md-offset-4">
						<div class="checkbox icheck col-md-6">
							<label>
								<input type="checkbox" name="remember"> &nbsp The Information that is entered is correct!<span class="text-red"><strong>*</strong></span>
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-warning btn-block pull-right">Submit</button>
					</div>
				</div>
				{{-- end form --}}
			</form>
		</div>

		<div class="box-footer">
			<span class="text-red"><strong>*</strong></span>Required Fields
		</div>
	</div>
	<!-- /.box -->


</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/userPage/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

<script>
	$('#dateOfBirth').datepicker({
		autoclose: true
	})

	$('#openingDate').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
	})

	$('#closingDate').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
	})

	$('.select2').select2({
		placeholder: "Select…"
	})

	$("#jobcategoryId").val("{{ old('jobcategoryId') }}").trigger('change');
	$("#preferedworktype").val("{{ old('preferedworktype') }}").trigger('change');
	$("#preferedednlevel").val("{{ old('preferedednlevel') }}").trigger('change');
</script>

@endsection