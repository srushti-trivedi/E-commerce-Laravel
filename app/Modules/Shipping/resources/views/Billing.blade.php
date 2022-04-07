@extends('mainView')

@section('content')
	<div class="woocommerce">
		<div class="container">
			<div class="content-top">
				<h2>Checkout</h2>
				<p>Need to Help? Call us: +9 123 456 789 or Email: <a href="mailto:Support@Rosi.com">Support@Rosi.com</a></p>
			</div><!--- .content-top-->
			<div class="checkout-step-process">
				<ul>
					<li>
						<div class="step-process-item active"><i data-href="checkout-step2.html"  class="redirectjs  step-icon icon-pointer"></i><span class="text">Address</span></div>
					</li>
					<li>
						<div class="step-process-item"><i class="step-icon-truck step-icon"></i><span class="text">Shipping</span></div>
					</li>
					<li>
						<div class="step-process-item"><i data-href="checkout-step4.html"  class="redirectjs  step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
					</li>
					<li>
						<div class="step-process-item"><i data-href="checkout-step5.html"  class="redirectjs  step-icon icon-notebook"></i><span class="text">Order Review</span></div>
					</li>
				</ul>
			</div><!--- .checkout-step-process --->

			<form name="checkout" method="POST" class="checkout woocommerce-checkout form-in-checkout" action="{{ url('addBilling') }}" enctype="multipart/form-data">
				@csrf
				<ul class="row">
					<li class="col-md-9">
						<div class="checkout-info-text">
							<h3>Billing Address </h3>
						</div>

						<div>
							<ul>
								<li class="col-md-12 col-left-12 checkout form-radios">
								@foreach($billing as $item)
									<span class="radio-hide">
										<input type="radio" class="shippingAdress" name="shipping_address" id="addNew" value="{{ $item->id }}" checked>
										<label for="bid">{{ $item->fname }} | {{ $item->lname }} | {{ $item->email }} | {{ $item->city }} | {{ $item->state }} | {{ $item->zipcode }} | {{ $item->country }} | {{ $item->phone_no }}</label>
									</span>
									<br>
								@endforeach
									<span class="radio-show">
										<input type="radio" class="shippingAdress" name="shipping_address" value="addNewAddress" id="addnew" >
										<label for="bid"> Add New </label>
									</span>
								</li>
							</ul>	
						</div>

						<div class="woocommerce-billing-fields">
							<ul class="row" id="shonew"{{--  style="display: none;" --}}>

								<li class="col-md-6">
									<p class="form-row validate-required" id="billing_first_name_field">
										<label for="fname" class="">First Name <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="fname" id="fname" placeholder="" value="">
										{{-- <span style="color: red">@error('fname'){{$message}}@enderror</span> --}}
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row validate-required" id="billing_last_name_field">
										<label for="lname" class="">Last Name <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="lname" id="lname" placeholder="" value="">
										{{-- <span style="color: red"> @error('lname') {{$message}}@enderror</span> --}}
									</p>
								</li>
								<li class="col-md-12  col-left-12">
									<p class="form-row  validate-required validate-email" id="billing_email_field">
										<label for="email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="email" id="email" placeholder="" value="">
										{{-- <span style="color: red">@error('email'){{$message}}@enderror</span> --}}
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row form-row-wide address-field validate-required" id="billing_city_field">
										<label for="city" class="">City <abbr class="required" title="required">*</abbr></label>
										<select class="custom-select" name="city" id="city">
											<option value="">--Select Option--</option>
											<option value="Ahmedabad">Ahmedabad</option>
											<option value="Surat">Surat</option>
											<option value="Gandhinagar">Gandhinagar</option>
											<option value="Bhandara">Bhandara</option>
											<option value="Nashik">Nashik</option>
											<option value="Mumbai">Mumbai</option>
											<option value="Jaisalmer">Jaisalmer</option>
											<option value="Ajmer">Ajmer</option>
											<option value="Udaipur">Udaipur</option>
										</select>
										{{-- <span style="color: red">@error('city'){{$message}}@enderror</span> --}}
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row address-field validate-state" id="state">
										<label for="state" class="">State/Province</label>
										<select type="text" class="custom-select" name="state" id="state">
											<option value="">--Select Option--</option>
											<option value="Gujarat">Gujarat</option>
											<option value="Maharashtra">Maharashtra</option>
											<option value="Rajasthan">Rajasthan</option>
										</select>
									</p>
									{{-- <span style="color: red">@error('state'){{$message}}@enderror</span> --}}
								</li>
								<li class="col-md-6">
									<p class="form-row address-field validate-postcode woocommerce-validated" id="billing_postcode_field">
										<label for="zipcode" class="">Zip code <abbr class="required" title="required">*</abbr></label>
										<input type="number" class="input-text " name="zipcode" id="zipcode" value="">
										{{-- <span style="color: red">@error('zipcode'){{$message}}@enderror</span> --}}
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row address-field validate-state" id="state" data-o_class="form-row form-row-first address-field">
										<label for="country" class="">Country</label>
										<input type="text" class="input-text " name="country" id="country" placeholder="" value="India">
										{{-- <span style="color: red">@error('country'){{$message}}@enderror</span> --}}
										{{-- <select type="text" class="custom-select" name="country" id="country">
											<option value="">--Select Option--</option>
											<option value="city-1">Country 1</option>
											<option value="city-2">Country 2</option>
											<option value="city-3">Country 3</option>
											<option value="city-4">Country 4</option>
										</select> --}}
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row validate-required validate-phone woocommerce-validated" id="billing_phone_field">
										<label for="phone_no" class="">Phone number <abbr class="required" title="required">*</abbr></label>
										<input type="number" class="input-text " name="phone_no" id="phone_no" placeholder="" value="">
										{{-- <span style="color: red">@error('phone_no'){{$message}}@enderror</span> --}}
									</p>
								</li>
								
								{{-- <li class="col-md-12 col-left-12 form-radios">
									<span class="form-radio"><input type="radio" name="shipping-method" id="rb1" checked><label for="rb1">Ship to this address</label></span>
									<span class="form-radio"><input type="radio" name="shipping-method" id="rb2"><label for="rb2">Ship to different address</label></span>
								</li> --}}
								<ul>
									<li>
										<div class="checkout-col-footer">
											<div class="note">(<span>*</span>) Required fields</div>
										</div>
									</li>
								</ul>
							</ul>
							
							<ul>
								<li class="col-md-12 col-left-12 form-radios">
									<span class="form-radio"><input type="radio" value="sameAddress" name="shipping_method" id="rb1"checked><label for="rb1">Ship to this address</label></span>
									<span class="form-radio"><input type="radio" value="differentAddress" name="shipping_method" id="rb2" ><label for="rb2">Ship to different address</label></span>
								</li>
							</ul>
						</div><!--- .woocommerce-billing-fields--->	
						
						<input type="submit" value="Continue" class="btn-step">							
						
					</li>
				</ul>
			</form><!--- form.checkout--->
			
				<div class="line-bottom"></div>
			
		</div><!--- .container--->
	</div><!--- .woocommerce--->
@endsection

@section('contentScript')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		$(document).ready(function(){	
			$('#shonew').hide();
			$('.shippingAdress').click(function(){

				var AddNewAdress = $(this).val();
				if(AddNewAdress == "addNewAddress"){
					$('#shonew').show();
				}else{
					$('#shonew').hide();
				}
				//alert('test');
				// $('#shonew').toggle();
				//$(".woocommerce-billing-fields").toggle();
			});

			
		});
	</script>
@endsection