<div class="wrapper">
	<noscript>
		<div class="global-site-notice noscript">
			<div class="notice-inner">
				<p> <strong>JavaScript seems to be disabled in your browser.</strong><br /> You must have JavaScript enabled in your browser to utilize the functionality of this website.</p>
			</div>
		</div>
	</noscript>
	<div class="page">
		<div class="header-container header-color color">
			<div class="header_full">
				<div class="header">
					<div class="header-logo show-992">
						<a href="{{ url('/mainindex') }}" class="logo"> <img class="img-responsive" src="{{ asset('abani/assets/images/logo.png') }}" alt="" /></a>
					</div><!--- .header-logo -->
					<div class="header-bottom">
						<div class="container">
							<div class="row">
								<div class="header-config-bg">
									<div class="header-wrapper-bottom">
										<div class="custom-menu col-lg-12">
											<div class="header-logo hidden-992">
												<a href="{{ url('/mainindex') }}" class="logo"> <img class="img-responsive" src="{{ asset('abani/assets/images/logo.png') }}" alt="" /></a>
											</div><!--- f.header-logo -->
											<div class="magicmenu clearfix">
												<ul class="nav-desktop sticker">
													<li class="level0 logo display"><a class="level-top" href="{{ url('/mainindex') }}"><img alt="logo" src="{{ asset('abani/assets/images/logo.png') }}"></a></li>
													<li class="level0 home">
														<a class="level-top" href="{{ url('/mainindex') }}"><span class="icon-home fa fa-home"></span><span class="icon-text">Home</span></a>
														{{-- <div class="level-top-mega">
															<div><a href="index.html"><span class="demo-home">Home 01 / Default</span></a></div>
															<div><a href="index2.html"><span class="demo-home">Home 02 / Digital</span></a></div>
															<div><a href="index3.html"><span class="demo-home">Home 03 / Fashion</span></a></div>
														</div> --}}
													</li>
												</ul>
											</div><!--- .magicmenu -->	
										</div><!--- .custom-menu -->
									</div><!--- .header-wrapper-bottom -->
								</div><!--- .header-config-bg -->
							</div><!--- .row -->
						</div><!--- .container -->
					</div><!--- .header-bottom -->
					<div class="header-page clearfix">
						<div class="header-setting header-search">
							<div class="settting-switcher">
								{{-- <div class="dropdown-toggle">
									<div class="icon-setting"><i class="icon-magnifier icons"></i></div>
								</div>
								<div class="dispaly-seach dropdown-switcher">
									<form id="search_mini_form" action="#" method="get">
										<div class="form-search clearfix"> 
											<input id="catsearch" type="hidden" name="cat" /> 
											<input id="search" type="text" name="q" class="input-text" placeholder="Search ..." />
											<select class="ddslick"  id="cat" name="cat">
												<option value="">Categories</option>
											</select>
											<button type="submit" title="Search" class="button"><span><span><i class="icon-magnifier icons"></i></span></span></button>
										</div><!--- .form-search -->
									</form><!--- #search_mini_form -->
								</div> --}}
							</div>
						</div><!--- .header-search -->
						<div class="header-setting">
							<div class="settting-switcher">
								<div class="dropdown-toggle">
									<div class="icon-setting"><i class="icon-settings icons"></i></div>
								</div>
								<div class="dropdown-switcher">
									<div class="top-links-alo">
										<div class="header-top-link">
											<ul class="links">
												<li><a href="/products" title="Products" >Products</a></li>
												{{-- <li><a href="my-wish-list.html" title="My Wishlist" >My Wishlist</a></li>
												<li><a href="compare.html" title="Compare Products" >Compare Products</a></li> --}}
												<li><a href="{{ url('cart') }}" title="My Cart" >My Cart</a></li>
												{{-- <li ><a href="checkout-step1.html" title="Checkout" class="top-link-checkout">Checkout</a></li> --}}
												
												<li class=" last" >
													@if (Route::has('login'))
														@auth
															<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
																@csrf
															</form>
															<a href="{{ route('orderViewStep') }}" title="My Order" >My Order</a>
															<a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">LOGOUT </a>

														@else
															<a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
															@if (Route::has('register'))
									                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
									                        @endif
														@endauth
													@endif
												</li>
											</ul>
										</div>
									</div><!--- .top-links-alo -->
									<div class="currency_top">
										<div class="currency-switcher">
											<div class="label-title">Currency</div>
											<ul class="currency-switcher dropdown">
												<li class="current">US DOLAR</li>
												<li><a href="#">EUR</a></li>
												<li><a href="#">GBP</a></li>
												<li><a href="#">JPY</a></li>
												<li><a href="#">CNY</a></li>
											</ul>
										</div>
									</div><!--- .currency_top -->
									<div class="top-form-language">
										<div class="lang-switcher">
											<div class="label-title">Language</div>
											<ul class="language-switcher dropdown">
												<li class="current"><span class="label dropdown-icon" style="background-image:url(abani/assets/images/flag_default.png);">&nbsp;</span></li>
												<li><a href="#"><span class="label dropdown-icon" style="background-image:url(abani/assets/images/flag_french.png);">&nbsp;</span></a></li>
												<li><a href="#"><span class="label dropdown-icon" style="background-image:url(abani/assets/images/flag_german.png);">&nbsp;</span></a></li>
												<li><a href="#"><span class="label dropdown-icon" style="background-image:url(abani/assets/images/flag_au.png);">&nbsp;</span></a></li>
											</ul>
										</div>
									</div><!--- .top-form-language -->
								</div><!--- .dropdown-switcher -->
							</div><!--- .settting-switcher -->
						</div><!--- .header-setting -->
						<div class="miniCartWrap" id="miniCartWrap">
							<div class="mini-maincart">
								<div class="cartSummary">
									<div class="crat-icon"> 
										<span class="icon-handbag icons"></span>
										<p class="mt-cart-title">My Cart</p>
									</div>
									<div class="cart-header"> 
										<span class="zero">0 </span>
										<p class="cart-tolatl"> 
											<span class="toltal">Total:</span>
											<span><span class="price">$0.00</span></span>
										</p>
									</div>
								</div><!--- .cartSummary -->
								<div class="mini-contentCart" style="display: none">
									<div class="block-content" id="cart-sidebar">
										
									</div>
								</div><!--- .mini-contentCart -->
							</div><!--- .mini-maincart -->
						</div><!--- .miniCartWrap -->
						{{-- <div class="header-setting hidden-sm hidden-xs">
							<div class="settting-switcher">
								<div class="dropdown-toggle">
									<div class="icon-setting">
										<i class="icon-arrow-up icons"></i>
									</div>
								</div>
							</div><!--- .settting-switcher -->
						</div><!--- .header-setting --> --}}
					</div><!--- .header-page -->
				</div><!--- .header -->
			</div><!--- .header_full -->
		</div><!--- .header-container -->
		
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function(){
				
				$('#miniCartWrap').on('click',function(){
					miniCart();
				});
			});
			function miniCart(){
				url = '{{ url("/minicart") }}';

				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
					type: "GET",
					datatype: 'html',
					url: url,
					data: {
						view: $('#miniCartWrap').hasClass('active'),
					},
					success: function(data){
						$('#cart-sidebar').html(data);
					}
				});
			}
		</script>
