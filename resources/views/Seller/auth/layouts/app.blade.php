<!DOCTYPE html>
<html lang="en">
<head>
	@include('Seller.auth.layouts.headsection')
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="/seller"><img src="{{ asset('assets/staticImages/Logos/rentomaticalogincdc.png') }}" height="140"></a>
		</div>
		<!-- /.login-logo -->

	@section('body')
		@show
		
	</div>

	@include('Seller.auth.layouts.footersection')
</body>
</html>