<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-default template-all">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Phone World | Front </title>
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
</head>

<body>
	
	<div class="wrapper">
		<div class="page">

			@include('frontend.header')

			<div class="main-container col1-layout content-color color">
				<div class="alo-block-slide">
					<div class="container-none flex-index">
						<div class="flexslider"  >
							<div id="slider-index" class="slides">
								<div class="item"> 
									<a  href="#"><img src="frontend\images\404698.jpg" alt="magicslider"></a>
									<div class="bx-caption start play">
										<div class="container">
											<div class="text-slide">
											{{--<img src="abani/assets/images/slide1.jpg" alt="magicslider"> 	<h3 class="caption1">Sale</h3>
												<h3 class="caption2">Extra<strong>30%</strong>off</h3>
												<h2 class="caption3">When you buy from 2 or more...</h2>
												<p class="icon-anchor icons caption6"><span class="hidden">hidden</span></p> --}}
												<a href="{{ url('/products') }}" class="btn-shop caption4">Shop Now</a>
											</div>
										</div>
									</div>
								</div>
								<div class="item"> 
									<a  href="#"><img src="frontend\images\07_galaxys20series_lifestyle_image.jpg" alt="magicslider"></a>
									<div class="bx-caption ">
										<div class="container">	
											<div class="text-slide text-slide2">
												{{-- <h3 class="caption1">Men’s</h3>
												<h3 class="caption2">looks</h3>
												<h2 class="caption3">Summer</h2>
												<h2 class="caption5">2015</h2> --}}
												<h3 class="caption4"><a href="#" class="btn-shop">Shop Now</a></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<a  href="#"> <img src="frontend\images\672338.jpg" alt="magicslider"> </a>
									<div class="bx-caption ">
										<div class="container">
											<div class="text-slide text-slide3">
												{{-- <h3 class="caption1">Mid-Season</h3>
												<h3 class="caption2">Must have for Women 2015</h3> --}}
												<h3 class="caption4"><a href="#" class="btn-shop">Shop Now</a></h3>
											</div>
										</div>
									</div>
								</div>
							</div><!--- #slider-indexs-->
						</div> 
					</div>
				</div><!--- .alo-block-slide-->
			</div><!--- .main-container -->

			@include('frontend.footer')

		</div><!--- .page -->
	</div><!--- .wrapper -->
	
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