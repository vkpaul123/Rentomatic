@extends('User.homepage.layouts.app')
@section('title', 'Users')

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <span class="text-primary"><b>User</b> </span> View Property
    <small>see your advertized property</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">View Property</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Property</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
      </div>
    </div>

    <div class="box-body">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <div class="row">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  @isset ($property->photo1)
                  <div class="item active">
                    <img src="{{ $property->photo1 }}" alt="First slide">
                  </div>
                  @endisset

                  @isset ($property->photo2)
                  <div class="item">
                    <img src="{{ $property->photo2 }}" alt="Second slide">
                  </div>
                  @endisset

                  @isset ($property->photo3)
                  <div class="item">
                    <img src="{{ $property->photo3 }}" alt="Third slide">
                  </div>
                  @endisset
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <hr>
          
          <div class="col-md-5">
            <h4><span style="color: #367fa9;">About Property</span></h4>
            
            <div class="box box-border box-body box-primary">

              <div class="row box-header">
                <div class="col-md-5"><strong>Property Type</strong></div>
                <div class="col-md-7">{{ $property->propertyType }}</div>
              </div>

              <div class="row box-header">
                <div class="col-md-5"><strong>Price</strong></div>
                <div class="col-md-7">{{ $property->price }}</div>
              </div>

              <div class="row box-header">
                <div class="col-md-5"><strong>Contact No</strong></div>
                <div class="col-md-7">{{ Auth::user()->phno }}</div>
              </div>

              <div class="row box-header">
                <div class="col-md-5"><strong>Email</strong></div>
                <div class="col-md-7">{{ Auth::user()->email }}</div>
              </div>

            </div>
          </div>

          <div class="col-md-5 col-md-offset-2">
            <h4><span style="color: #367fa9;">Renting Status</span></h4>
            <div class="box box-border box-body box-primary">
              <div class="row box-header">
                <div class="col-md-5"><strong>Status</strong></div>
                <div class="col-md-7">
                  @if ($property->sold)
                    <span class="text-success">Renting</span>
                  @else
                    <span class="text-warning">Vacant</span>
                  @endif
                </div>
                
              </div>
              <hr>
              @if (Session::has('messageSuccess'))
                <div class="alert alert-success">{!! Session::get('messageSuccess') !!}
                  <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                </div>
              @endif
              <form action="{{ route('property.request.meeting') }}" method="post">
                {{ csrf_field() }}

                <input type="hidden" value="{{ $property->id }}" name="property_id">

                <input type="submit" value="Request Meeting" class="btn btn-block btn-warning" @isset ($existingReq)
                    disabled 
                @endisset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><strong><span style="color: #367fa9;">Property Highlights</span></strong></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
      </div>
    </div>

    <div class="box-body">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">

            {{ $property->highlights }}
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><strong><span style="color: #367fa9;">Address</span></strong></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
      </div>
    </div>

    <div class="box-body">
      <div class="row">
        <div class="col-md-4">
          <strong>Address</strong>
        </div>
        <div class="col-md-8">
          {{ $property->addressText }}
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-md-4">
          <strong>Locality</strong>
        </div>
        <div class="col-md-8">
          {{ $property->locality }}
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-md-4">
          <strong>Landmarks</strong>
        </div>
        <div class="col-md-8">
          {{ $property->landmark1 }} <br>
          {{ $property->landmark2 }}
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-md-4">
          <strong>Street</strong>
        </div>
        <div class="col-md-8">
          {{ $property->street }}
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-md-4">
          <strong>District</strong>
        </div>
        <div class="col-md-8">
          {{ $property->district }}
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-md-4">
          <strong>City</strong>
        </div>
        <div class="col-md-8">
          {{ $property->city }}
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-md-4">
          <strong>State</strong>
        </div>
        <div class="col-md-8">
          {{ $property->state }}
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-md-4">
          <strong>Pincode</strong>
        </div>
        <div class="col-md-8">
          {{ $property->pincode }}
        </div>
      </div>
      <br>
    </div>
  </div>          

</section>
<!-- /.content -->

@endsection