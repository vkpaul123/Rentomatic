<!DOCTYPE html>
<html lang="en">
<head>
	@include('Seller.homepage.layouts.headcontent')
</head>
<body class="hold-transition skin-yellow sidebar-mini">
	<div class="wrapper">
		@include('Seller.homepage.layouts.header')

		@include('Seller.homepage.layouts.sidebar')

		<div class="content-wrapper">
			@section('body')
				@show
		</div>
		@include('Seller.homepage.layouts.footer')
	</div>
	@include('Seller.homepage.layouts.loadscripts')
</body>
</html>