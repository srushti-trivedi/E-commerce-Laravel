<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-default template-all">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> PhoneWorld | Product | Details </title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" type="text/css" href="{{ asset('abani/assets/styles/styles.css') }}" media="all" />

</head>
<body>
	
	@include('frontend.header')	
			<div class="main-container col2-left-layout ">
				<div class="container">
					<div class="main">
						<div class="row">
							<div class="col-main col-lg-12">
								<div class="product-view">
									@foreach($products as $product)
									<div class="product-essential">
										<div class="row">
											<form action="#" method="post" id="product_addtocart_form">
												<div class="product-img-box clearfix col-md-5 col-sm-5 col-xs-12">
													<div class="product-img-content">
														<div class="product-image product-image-zoom">
															<div class="product-image-gallery"> {{-- <span class="sticker top-left"><span class="labelnew">New</span></span><span class="sticker top-right"><span class="labelsale">Sale</span></span> --}} <img id="image-main"
																class="gallery-image visible img-responsive"
																src="{{ asset('uploads/cover/'.$product->coverImg)}}"
																alt="Images"
																title="Short Sleeve Dress" /></div>
														</div><!--- .product-image-->
														<div class="more-views">
															<h2>More Views</h2>
															<ul class="product-image-thumbs">
																<li> <a class="thumb-link" href="#" title="" data-image-index="0"> <img class="img-responsive" src="{{ asset('uploads/cover/'.$product->coverImg) }}"
																	alt="Image"> </a></li>
																	@foreach($images as $img)
																		<li> <a class="thumb-link" href="#" title="" data-image-index="1"> <img class="img-responsive" src="{{ asset('uploads/cover/'.$img->image ) }}" alt="More Images"> </a></li>
																	@endforeach

															</ul>
														</div><!--- .more-views -->
													</div><!--- .product-img-content-->
												</div><!--- .product-img-box-->
												<div class="product-shop col-md-7 col-sm-7 col-xs-12">
													<div class="product-shop-content">
														<div class="product-name">
															
															<input type="hidden" value="{{ $product->id }}" class="product_id">
															<h1>{{ $product->product_name }}</h1>
														</div>
														
														<div class="product-type-data">
															<div class="price-box">
																{{-- <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> ₹{{ $product->price }}.00 </span></p> --}}
																<p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> ₹{{ $product->price }}.00 </span></p>
															</div>
															<p class="availability in-stock">
																@if($product->stock > 0)
																	<label class="btn btn-success">In stock{{--  {{$product->stock}} --}}</label>
																@else
																	<label class="btn btn-danger">Out of stock{{--  {{$product->stock}} --}}</label>
																@endif
															</p>
															<div class="products-sku"> <span class="text-sku">Product Code: {{ $product->upc }}</span> </div>
														</div>
														<div class="short-description">
															<h2>Short Description</h2>
															<p>{{ $product->description }}...
														</div>
														<div class="add-to-box">
															<div class="product-qty">
																<label for="qty">Qty:</label>
																<div class="custom-qty"> <input type="text" name="qty" id="qty" maxlength="10" value="1" title="Qty" class="input-text qty" oninput="this.value = this.value.replace(/[^/1-10\s]/g, '').replace(/(\..*)\./g);" /> <button  type="button" value="{{$product->id}}" class="increase items incrementBtn" {{-- onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty < 10) result.value++;return false;" --}}> <i class="fa fa-plus"></i> </button> <button  type="button" class="reduced items decrementBtn" {{-- onclick="var r esult = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) result.value--;return false;" --}}> <i class="fa fa-minus"></i> </button></div>
															</div>
															@if($product->stock > 0)
															<div class="add-to-cart">
																<a href="#{{-- {{url('addtocart/'.$product->id)}} --}}">
																	<button type="button" title="Add to Cart" class="button btn-cart">
																		<span> 
																			<span class="view-cart icon-handbag icons addToCart">Add to Cart</span>
																		</span> 
																	</button>
																</a>
															</div>
															@endif
														</div>
														<div class="addit">
															<div class="alo-social-links clearfix">
																
															</div>
														</div>
													</div><!--- .product-shop-content-->
												</div><!--- .product-shop-->
											</form>
										</div>
									</div><!--- .product-essential-->
									<div class="product-wapper-tab clearfix">
										<ul class="toggle-tabs">
											<li class="item active" target=".box-description">Description</li>
											<li class="item " target=".box-reviews">Reviews</li>
										</ul>
										<div class="product-collateral">
											<div class="box-collateral box-description active">
												<h2>Description</h2>
												<h2>Details</h2>
												<div class="std">
													<p>{{ $product->description }}</p>
												</div>
											</div>
											
											<div class="box-collateral box-reviews">
												<h2>Reviews</h2>
												<div class=" box-reviews" id="customer-reviews">
													<h2>Customer Reviews</h2>
													<dl>
														<dt> <a href="#">simple product</a> Review by <span>simple product</span></dt>
													</dl>
												</div>
											</div>
										</div>
									</div><!--- .product-wapper-tab-->
									@endforeach
								</div><!--- .product-view-->
							</div><!--- .col-main-->
						</div><!--- .row-->
					</div><!--- .main-->
				</div><!--- .container-->
			</div><!--- .main-container -->
					
			@include('frontend.footer')	
		</div><!--- .page -->
	</div><!--- .wrapper -->


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function(){
			$('.incrementBtn').click(function(){
				var iValue = $('.qty').val();
				var id = $(this).val();
				var value = parseInt(iValue,10);
				value = isNaN(value) ? 0 : value;
				
				$.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "/increment/"+id,
 					
                    success: function(data){
                    	// document.write(response);
                    	var stock = data.stock;
                    	if(value <23 && value < stock)
						{
							value++;
							$('.qty').val(value);
							
						}
						else if(value==stock)
						{
							alert("selected quentity are not more in our stock");
							
						}

                    }      
                });
    // 			if(value<23)
				// {
				// 	value++;
				// 	$('.qty').val(value);
				// }
			});
			$(document).on('click','.decrementBtn',function(){
				var dValue = $('.qty').val();
				var value = parseInt(dValue,10);
				value= isNaN(value) ? 0 : value;
				if(value>1)
				{
					value--;
					$('.qty').val(value);
				}
			});
			$(document).on('click','.addToCart',function(){
				var product_id = $('.product_id').val();
				var quantity = $('.qty').val();
				// alert(product_id);
				// alert(quantity);
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
					method: "GET",
					url: "/add-to-cart",
					data: {
						'product_id' : product_id,
						'quantity' : quantity,
					},
					success: function(response){
						alert(response.status);
					}
				});
			});
		});
	</script>
	
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.noconflict.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/bootstrap/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.bxslider.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.ddslick.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.easing.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.meanmenu.hack.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.fancybox.pack.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.animateNumber.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.flexslider-min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery.heapbox-0.9.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/isotope.pkgd.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/packery-mode.pkgd.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/video.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/jquery-ui.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/magiccart/magicproduct.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/magiccart/magicaccordion.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/magiccart/magicmenu.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/script.js') }}"></script>
	<!--[if lt IE 9]> 
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/bootstrap/html5shiv.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/bootstrap/respond.min.js') }}"></script> <![endif]-->
	<!--[if lt IE 7]> 
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/lte-ie7.js') }}"></script>
	<script type="text/javascript" src="{{ asset('abani/assets/scripts/ds-sleight.js') }}"></script>

	<link rel="stylesheet" type="text/css" href="{{ asset('abani/assets/styles/styles-ie.css') }}" media="all" /> <![endif]-->
</body>
</html>

{{-- // var result = document.getElementById('qty');
// var qty = result.value;
// if( !isNaN( qty ) && qty < 10)
// 	result.value++;
// return false; --}}