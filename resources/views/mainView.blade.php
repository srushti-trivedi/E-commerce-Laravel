<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-default template-all">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> PhoneWorld | Products </title>	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" type="text/css" href="abani/assets/styles/styles.css" media="all" />
	{{-- <style type="text/css">
		.flexslider .slides img {
			max-width: 100%; 
			margin-left: 19%;
		    height: 500px;
		    width: 1093px; 
		    display: block;
		}
	</style> --}}
	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		  -webkit-appearance: none;
		  margin: 0;
		}
	</style>
</head>

<body>
	@include('frontend.header')
	<div class="main-container col1-layout content-color color">
		<div class="breadcrumbs">
			<div class="container">
				<ul>
					<li class="home"> <a href="{{ url('/mainindex') }}" title="Go to Home Page">Home</a></li>
					<li class="category4"> <a href="{{ url('/products') }}" title="Go to Products"> <strong>Mobiles</strong></li>
				</ul>
			</div>
		</div><!--- .breadcrumbs-->

		@if(session('status'))
			    <div class="alert alert-success">{{session('status')}}</div>
		@endif

		@yield('content')
	</div><!--- .main-container -->

	@yield('contentScript')
	
	<div class="footer-container footer-color color">
		@include('frontend.footer')
		
	{{-- @yield('listgrid') --}}
	
	
	
	<script type="text/javascript" src="abani/assets/scripts/jquery.min.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/jquery.noconflict.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/jquery.bxslider.js"></script> 
	<script type="text/javascript" src="abani/assets/scripts/jquery.ddslick.js"></script> 
	<script type="text/javascript" src="abani/assets/scripts/jquery.easing.min.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/jquery.meanmenu.hack.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/jquery.animateNumber.min.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/jquery.heapbox-0.9.4.min.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/packery-mode.pkgd.min.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/video.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/jquery-ui.js"></script>
	
	<script type="text/javascript" src="abani/assets/scripts/magiccart/magicproduct.js"></script> 
	<script type="text/javascript" src="abani/assets/scripts/magiccart/magicaccordion.js"></script> 
	<script type="text/javascript" src="abani/assets/scripts/magiccart/magicmenu.js"></script>
	
	<script type="text/javascript" src="abani/assets/scripts/script.js"></script>
	<!--[if lt IE 9]> 
	<script type="text/javascript" src="abani/assets/scripts/bootstrap/html5shiv.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/bootstrap/respond.min.js"></script> <![endif]-->
	<!--[if lt IE 7]> 
	<script type="text/javascript" src="abani/assets/scripts/lte-ie7.js"></script>
	<script type="text/javascript" src="abani/assets/scripts/ds-sleight.js"></script>

	<link rel="stylesheet" type="text/css" href="abani/assets/styles/styles-ie.css" media="all" /> <![endif]-->
</body>
</html>