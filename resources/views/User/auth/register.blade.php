@extends('User.auth.layouts.app')
@section('title', 'Register')

@section('body')

<div class="login-logo">
	<a href="/"><img src="{{ asset('assets/staticImages/Logos/rentomaticalogincdc.png') }}" height="140"></a>
</div>
<!-- /.login-logo -->

<div class="login-box-body">
	<p class="login-box-msg"><b>Register</b> as New <span style="color: #367fa9; font-weight: bold;">Buyer</span>...</p>

	<form action="{{ route('register') }}" method="post">
	{{ csrf_field() }}
		<div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
			<input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('phno') ? ' has-error' : '' }}">
			<input type="text" name="phno" class="form-control" placeholder="Phone Number" value="{{ old('phno') }}" autofocus required minlength="10" maxlength="10">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('phno'))
			<span class="help-block">
				<strong>{{ $errors->first('phno') }}</strong>
			</span>
			@endif
		</div>
		
		<div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
			<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
			<input type="password" class="form-control" placeholder="Password" name="password" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback">
			<input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" name="password_confirmation" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		
		<div class="row">
			<div class="col-xs-4 pull-right">
				<button type="submit" class="btn btn-primary btn-block">Register</button>
			</div>
			<!-- /.col -->
		</div>
	</form>

	<!-- /.social-auth-links -->

</div>
<!-- /.login-box-body -->

@endsection