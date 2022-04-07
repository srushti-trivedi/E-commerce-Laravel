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
					<div class="step-process-item"><i data-href="checkout-step3.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Delivery & Payment</span></div>
				</li>
				<li>
					<div class="step-process-item active"><i data-href="checkout-step4.html" class="redirectjs step-icon icon-notebook"></i><span class="text">Order Review</span></div>
				</li>
			</ul>
		</div><!--- .checkout-step-process-->						

		<ul class="row">
			<form method="POST" action="{{ url('addOrder') }}" enctype="multipart/form-data">
				@csrf
				<li class="col-md-9 col-padding-right">
					<table class="table-order table-order-review">
						<thead>
							<tr>
								<td width="68">Product Name</td>
								<td width="14">price</td>
								<td width="14">QTY</td>
								<td width="14">Total</td>
							</tr>
						</thead>
						<tbody>
							@php 
								$total_price = 0;
								$total_qty = 0;
								
							@endphp


							@foreach($cartProducts as $data)
							<tr>

								<input type="hidden" name="pro_id[]" value="{{ $data->products->id }}">
								<input type="hidden" name="qty[]" value="{{ $data->quantity }}">
								<input type="hidden" name="price[]" value="{{ $data->products->price * $data->quantity }}">

								<td class="name"> {{ $data->products->product_name }} </td>
								<td> {{ $data->products->price }} </td>
								<td> {{ $data->quantity }} </td>
								<td class="price">{{ $data->products->price * $data->quantity }}</td>
							</tr>
							
							@php 
								$total_qty += $data->quantity ; 
								$total_price += $data->products->price * $data->quantity ;

								// if($data->products->id >= 0)
								// 	$pro_id[] = $data->products->id;
								// $this->{$pro_id}[] =$product_id;
							@endphp
							@endforeach
						</tbody>
					</table>
					<table class="table-order table-order-review-bottom">
						<tr>
							<td class="first" width="80%">Sub total</td>
							<td width="20%">{{ $total_price }}</td>
						</tr>
						<tr>
							<td class="first large">Total Payment</td>
							<td class="price large">{{ $total_price }}.00</td>
						</tr>
						<tfoot>
							<td colspan="2">
								{{-- <div class="left">Forgot an Item? <a href="#">Edit Your Cart</a></div> --}}
								<div class="right">
									<input type="hidden" name="total_price" value="{{ $total_price }}">
									<input type="hidden" name="total_qty" value="{{ $total_qty }}">
									<input type="button" value="Back" class="btn-step">
									<input type="submit" value="Place Order" class="btn-step btn-highligh">
								</div>
							</td>
						</tfoot>
					</table>
				</li>
				<li class="col-md-3">
					<ul class="step-list-info">
						<li>
							<div class="title-step">
								Billing Address<a href="{{ route('checkout') }}">CHANGE</a>
							</div>
							@foreach($billingAddress as $bAdd)
							<p>
								<strong> {{ $bAdd->fname }} {{ $bAdd->lname }}</strong>
								{{-- <br> {{ $bAdd->address }}, --}}
								<br> {{ $bAdd->city }},{{ $bAdd->state }},
								<br> {{ $bAdd->country }}, {{ $bAdd->zipcode }}
								<br> {{ $bAdd->phone_no }}
							</p>
							@endforeach
						</li>
						<li>
							<div class="title-step">Shipping Address<a href="{{ route('shippingStep') }}">CHANGE</a></div>
							@foreach($shippingAddress as $sAdd)
							<p>
								<strong> {{ $sAdd->fname }} {{ $sAdd->lname }}</strong>
								{{-- <br> {{ $sAdd->address }}, --}}
								<br> {{ $sAdd->city }},{{ $sAdd->state }},
								<br> {{ $sAdd->country }}, {{ $sAdd->zipcode }}
								<br> {{ $sAdd->phone_no }}
							</p>
							@endforeach
						</li>
						{{-- <li>
							<div class="title-step">Shipping Method<a href="#">CHANGE</a></div>
							<p>Flat Rate - Fixed $15.00</p>
						</li> --}}
						<li>
							<div class="title-step">Payment Method<a href="{{ route('paymentStep') }}">CHANGE</a></div>
							@foreach($paymentMethod as $pMethod)
								<p>{{ $pMethod->method }}</p>
							@endforeach
						</li>
					</ul>
				</li>
			</form>
		</ul>

		<div class="line-bottom"></div>
	</div><!--- .container-->	
</div><!--- .woocommerce-->
@endsection
