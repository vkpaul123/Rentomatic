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
		<span style="color:#e08e0b;"><b>Seller</b> </span> Edit Property To-Let
		<small>Edit an advertizement for your property</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Edit Property</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Create Property</b></h3>
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

			<form action="{{ route('property.update', $property->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
				{{csrf_field()}}
				{{ method_field('PUT') }}
				
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
						<input type="text" class="form-control pull-right" id="price" name="price" placeholder="Price" min="0" value="{{ $property->price }}">
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Upload Photos</span></h4>

				<div class="form-group{{ $errors->has('photo1') ? ' has-error' : '' }}">
					<label for="photo1" class="col-md-3 control-label">Photo 1</label>
					<div class="col-md-6">
						<img src="{{ $property->photo1 }}" alt="" class="img-responsive pull-right">
						<input type="file" class="form-control pull-right" id="photo1" name="photo1" placeholder="Prefered Experience" min="0" required value="{{ $property->photo1 }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('photo2') ? ' has-error' : '' }}">
					<label for="photo2" class="col-md-3 control-label">Photo 2</label>
					<div class="col-md-6">
						<img src="{{ $property->photo2 }}" alt="" class="img-responsive pull-right">
						<input type="file" class="form-control pull-right" id="photo2" name="photo2" placeholder="Prefered Experience" min="0" required value="{{ $property->photo2 }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('photo3') ? ' has-error' : '' }}">
					<label for="photo3" class="col-md-3 control-label">Photo 3</label>
					<div class="col-md-6">
						<img src="{{ $property->photo3 }}" alt="" class="img-responsive pull-right">
						<input type="file" class="form-control pull-right" id="photo3" name="photo3" placeholder="Prefered Experience" min="0" required value="{{ $property->photo3 }}">
					</div>
				</div>	

				<hr>
				<h4><span style="color: #e08e0b;">Property Highlights</span></h4>

				<div class="form-group{{ $errors->has('highlights') ? ' has-error' : '' }}">
					<label for="highlights" class="col-md-3 control-label">Highlights<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="highlights" name="highlights" placeholder="Highlights" rows="5">{{ $property->highlights }}</textarea>
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Property Address</span></h4>

				<div class="form-group{{ $errors->has('addressText') ? ' has-error' : '' }}">
					<label for="addressText" class="col-md-3 control-label">Address<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="addressText" name="addressText" placeholder="Address" rows="5">{{ $property->addressText }}</textarea>
					</div>
				</div>

				<div class="form-group{{ $errors->has('locality') ? ' has-error' : '' }}">
					<label for="locality" class="col-md-3 control-label">Locality<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="locality" name="locality" placeholder="Locality" min="0" value="{{ $property->locality }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark1') ? ' has-error' : '' }}">
					<label for="landmark1" class="col-md-3 control-label">Landmark 1</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="landmark1" name="landmark1" placeholder="Landmark 1" min="0" value="{{ $property->landmark1 }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark2') ? ' has-error' : '' }}">
					<label for="landmark2" class="col-md-3 control-label">Landmark 2</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="landmark2" name="landmark2" placeholder="Landmark 2" min="0" value="{{ $property->landmark2 }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
					<label for="street" class="col-md-3 control-label">Street<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="street" name="street" placeholder="Street Name" min="0" value="{{ $property->street }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
					<label for="district" class="col-md-3 control-label">District<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="district" name="district" placeholder="District" min="0" value="{{ $property->district }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
					<label for="city" class="col-md-3 control-label">City<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="city" name="city" placeholder="city" min="0" value="{{ $property->city }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
					<label for="state" class="col-md-3 control-label">State<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="state" name="state" placeholder="State" min="0" value="{{ $property->state }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
					<label for="pincode" class="col-md-3 control-label">Pincode<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="pincode" name="pincode" placeholder="Prefered Experience" min="0" value="{{ $property->pincode }}">
					</div>
				</div>

				

				<hr>
				<h4><span style="color: #e08e0b;">Property Status</span></h4>
				
				<div class="form-group{{ $errors->has('sold') ? ' has-error' : '' }}">
					<label for="sold" class="col-md-3 control-label">Sold Status</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="sold" name="sold" placeholder="Pincode" min="0" value="{{ $property->sold }}" disabled>
					</div>
				</div>


				

				<hr>
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

	$('.select2').select2({
		placeholder: "Select…"
	})

	$("#propertyType").val("{{ $property->propertyType }}").trigger('change');
</script>

@endsection