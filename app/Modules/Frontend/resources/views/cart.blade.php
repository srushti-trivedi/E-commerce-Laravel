
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-default template-all">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>PhoneWorld | Product | Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" type="text/css" href="abani/assets/styles/styles.css" media="all" />
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
	
	<div class="container">
		<div class="content-top no-border">
			<div class="card-header">
				<h2> Cart </h2>
				{{-- <div class="wish-list-notice"><i class="icon-check"></i>Product with Variants has been added to your wishlist. <a href="#">Click here</a> to continue shopping.</div> --}}
			</div>
		</div>
		@if(session('status'))
			<div class="alert alert-success">{{session('status')}}</div>
		@endif
		
		<div class="table-responsive-wrapper">
			<div class="card-body">
				<table class="table-order table-wishlist">
					<thead>
						<tr>
							<td>Remove</td>
							<td>Product Details </td>
							<td> Price & quantity </td>
							
						</tr>
					</thead>
					<tbody>
						@php $total = 0; @endphp
						@foreach($cartProducts as $cart)
							<div class="cartindic">
								<tr>
									<td>
										<input type="hidden" id="cart_id" class="cart_id" value="{{ $cart->id }}">
										<button type="button" class="button-remove delete-cart-item" value="{{ $cart->product_id}}"><i class="icon-close"></i></button>
									</td>
									<td>
										<table class="table-order-product-item">
											<tr>
												<td><img src="{{ asset('uploads/cover/'.$cart->products->coverImg) }}" width="70px" height="70px" alt="Image"></td>
												<td>
													<p>{{ $cart->products->product_name }}</p>
													{{-- <textarea></textarea> --}}
												</td>
											</tr>
										</table>
									</td>
									<td class="wish-list-control">
										<input type="hidden" value="{{ $cart->product_id }}" class="product_id">
										₹{{ $cart->products->price }}.00
										<div class="number-input">
											<button type="button" class="minus changeQtyBtn">-</button>
											<input type="number" value="{{ $cart->quantity }}" name="qty" class="qty" id="qty {{ $cart->id }}">
											<button type="button" class="plus changeQtyBtn">+</button>
										</div>
									</td>
									{{-- <td>
										<div class="edit_control"><button type="button" class="btn-edit"><i class="icon-note"></i> Edit</button></div>
									</td> --}}
								</tr>
							</div>
						@php $total += $cart->products->price * $cart->quantity ; @endphp
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<font size="4"> Total Price: {{ $total }}</font>
			</div>
		</div><!--- .table-responsive-wrapper-->
		
		{{-- <a class="btn btn-danger float-end" href="{{ url('checkout/') }}">Checkout</a> --}}
	</div><!--- .container-->

	@include('frontend.footer')


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function(){
			$('.plus').click(function(){
				var iValue = $(this).closest('.wish-list-control').find('.qty').val(); //$('.qty').val();
				var id = $(this).closest('.wish-list-control').find('.product_id').val();
				var value = parseInt(iValue,10);
				value = isNaN(value) ? 0 : value;
				
				$.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "/incrementcart/"+id,
 					
                    success: function(data){
                    	// document.write(response);
                    	var stock = data.stock;
                    	if(value < 23 && value < stock)
						{
							value++;
							$(this).closest('.wish-list-control').find('.qty').val(value);
							
						}
						else if(value==stock)
						{
							alert("selected quentity are not more in our stock");
							
						}
                    }      
                });
			});

			$(document).on('click','.minus',function(){
				var dValue = $(this).closest('.cartindic').find('.qty').val(); //$('.qty').val();
				var value = parseInt(dValue);
				
				if(value >= 1)
				{
					value--;
					$(this).closest('.wish-list-control').find('.qty').val(value);
				}
			});
			
			$('.delete-cart-item').click(function(e){
				e.preventDefault();

				var product_id = $(this).val();
				//alert(pro_id);
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
					method: "GET",
					url: "delete-cart",
					data: {
						'product_id':product_id,
					},
					success: function (response) {
						window.location.reload();
						alert(response.status);

					}
				});
			});	


			$('.changeQtyBtn').click(function(e){
				e.preventDefault();

				var pro_id = $(this).closest('.wish-list-control').find('.product_id').val();
				var qty = $(this).closest('.wish-list-control').find('.qty').val();

				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
					method : "POST",
					url : "update-qty-cart",
					data : {
						'pro_id' : pro_id,
						'pro_qty' : qty,
						_token: $('meta[name="csrf-token"]').attr('content')
					},
					success: function (response) {
						alert(response.status);
						window.location.reload();
					}
				});
			});		
		});
	</script>



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