@extends('mainView')

@section('content')
	<div class="woocommerce">
		<div class="container">
			<div class="content-top">
				<h2>My Order</h2>
				
			</div>
			<ul class="row">
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


							@foreach($orderView as $data)
							<tr>
								<td class="name">{{ $data->products->product_name}} </td>
								<td> {{ $data->products->price}} </td>
								<td> {{ $data->quantity }} </td>
								<td class="price">{{ $data->products->price * $data->quantity }}</td>
							</tr>

							@php 
								$total_qty += $data->quantity ; 
								$total_price += $data->products->price * $data->quantity ;
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
							<td class="price large">₹{{ $total_price }}.00</td>
						</tr>
						<tfoot>
							<td colspan="2">
								<div class="right">
									<input type="button" value="HOME" class="btn-step">
								</div>
							</td>
						</tfoot>
					</table>
				</li>
				<li class="col-md-3">
					<ul class="step-list-info">
						<li>
							<div class="title-step">
								Billing Address
							<hr size="30" noshade>
							</div>
							@foreach($orderAdd as $bAdd)
							<p>
								<strong> {{ $bAdd->shippings->fname }}, {{ $bAdd->shippings->lname }}</strong>
								<br> {{ $bAdd->shippings->city }},{{ $bAdd->shippings->state }},
								<br> {{ $bAdd->shippings->country }}, {{ $bAdd->shippings->zipcode }}
								<br> {{ $bAdd->shippings->phone_no }}
							</p>
							@endforeach
						</li>
						<li>
							{{-- <div class="title-step">
								Shipping Address
								
							</div>
							<hr size="30" noshade> --}}
							{{-- @foreach($shippingAddress as $sAdd)
							<p>
								<strong> {{ $sAdd->fname }}, {{ $sAdd->lname }}</strong>
								<br> {{ $sAdd->city }},{{ $sAdd->state }},
								<br> {{ $sAdd->country }}, {{ $sAdd->zipcode }}
								<br> {{ $sAdd->phone_no }}
							</p>
							@endforeach --}}
						</li>
						<li>
							<div class="title-step">
								Payment Method
								<hr>
							</div>
								<p>COD</p>
							{{-- @foreach($payment as $pMethod)
								<p>{{ $pMethod->method }}</p>
							@endforeach --}}
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
@endsection