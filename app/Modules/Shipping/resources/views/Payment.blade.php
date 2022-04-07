@extends('mainView')

@section('content')
<div class="woocommerce">
	<div class="container">
		<div class="content-top">
			<h2>Checkout</h2>
			<p>Need to Help? Call us: +9 123 456 789 or Email: <a href="mailto:Support@Rosi.com">Support@Rosi.com</a></p>
		</div>
		<div class="checkout-step-process">
			<ul>
				<li>
					<div class="step-process-item"><i data-href="checkout-step2.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Address</span></div>
				</li>
				<li>
					<div class="step-process-item"><i class="fa fa-check step-icon"></i><span class="text">Shipping</span></div>
				</li>
				<li>
					<div class="step-process-item active"><i data-href="checkout-step4.html" class="redirectjs step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
				</li>
				<li>
					<div class="step-process-item"><i data-href="checkout-step5.html" class="redirectjs step-icon icon-notebook"></i><span class="text">Order Review</span></div>
				</li>
			</ul>
		</div>

		<div class="checkout-info-text">
			<h3>Payment Method</h3>
		</div>
		<form name="checkout" method="POST" class="checkout woocommerce-checkout form-in-checkout" action="{{ url('addPayment') }}" enctype="multipart/form-data">
			@csrf
			<ul class="row">
				<li class="col-md-9">
					<ul class="row">
						<li class="col-md-6">
							<p class="form-row validate-required">
								<label for="delivery_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
								<input type="text" class="input-text " name="first_name" id="delivery_first_name">
							</p>
						</li>
						<li class="col-md-6">
							<p class="form-row validate-required">
								<label for="delivery_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
								<input type="text" class="input-text" name="last_name" id="delivery_last_name">
							</p>
						</li>
						<li class="col-md-6">
							<span class="radio-hide">
								<input type="radio" value="cod" name="payment-radio" id="pr1" checked>
								<label for="pr1" class="label-radio">COD</label>
							</span>
							{{-- <span class="radio-show">
								<input type="radio" class="shippingAdress" name="shipping_address" value="addNewAddress" id="addnew" >
								<label for="bid"> Add New </label>
							</span> --}}
						</li>
						<li class="col-md-12 col-left-12 last-row-control">
							<input type="submit" value="Continue" class="btn-step">
						</li> 
					</ul>
				</li>
			</ul>
		</form><!--- form.checkout--->
			
			<div class="line-bottom"></div>
			
		</div><!--- .container--->
	</div><!--- .woocommerce--->
	@endsection