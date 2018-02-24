<!DOCTYPE html>
<html lang="en">
<head>
	@include('User.homepage.layouts.headcontent')
</head>
<body class="hold-transition skin-blue sidebar-mini" @yield('startBodyScripts')>
	<div class="wrapper">
		@include('User.homepage.layouts.header')

		@include('User.homepage.layouts.sidebar')

		<div class="content-wrapper">
			@section('body')
				@show
		</div>
		@include('User.homepage.layouts.footer')
	</div>
	@include('User.homepage.layouts.loadscripts')
</body>
</html>