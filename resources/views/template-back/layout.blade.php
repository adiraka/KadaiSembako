<!DOCTYPE HTML>

<html>

<head>

	<title>Admin Area</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<link href="{{ asset('asset-back/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('asset-back/css/style.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('asset-back/css/font-awesome.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('asset-back/css/icon-font.min.css') }}" type='text/css' />

	<script src="{{ asset('asset-back/js/Chart.js') }}"></script>

	<link href="{{ asset('asset-back/css/animate.css') }}" rel="stylesheet" type="text/css" media="all">

	<script src="{{ asset('asset-back/js/wow.min.js') }}"></script>

	<script>
		new WOW().init();
	</script>

	<script src="{{ asset('asset-back/js/jquery-1.10.2.min.js') }}"></script>

</head> 

<body class="sticky-header left-side-collapsed"  onload="initMap()">

	<section>

		@include('template-back.partials.left-side')

		<div class="main-content main-content4">

			@include('template-back.partials.header')

			<div id="page-wrapper">
				<div class="graphs">

					<h3 class="blank1"> @yield('headerText') </h3>

					<div class="xs tabls">

						@yield('content')
						
					</div>
					
				</div>
			</div>
		</div>

		@include('template-back.partials.footer')

	</section>
	
	<script src="{{ asset('asset-back/js/jquery.nicescroll.js') }}"></script>
	<script src="{{ asset('asset-back/js/scripts.js') }}"></script>
	<script src="{{ asset('asset-back/js/bootstrap.min.js') }}"></script>

</body>

</html>