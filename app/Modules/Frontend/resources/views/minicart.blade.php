@php $total = 0; @endphp

<p class="block-subtitle">Recently added item(s)</p>
<ol id="cart-sidebar" class="mini-products-list clearfix">
	@foreach($cartProducts as $cart)
	<li class="item clearfix">
		<div class="cart-content-top">
			<a href="#" class="product-image"><img src="{{ asset('uploads/cover/'.$cart->products->coverImg) }}" width="60" height="77" alt="Brown Arrows Cushion"></a>
			<div class="product-details">
				<p class="product-name"><a href="#">{{ $cart->products->product_name }}</a></p>
				<strong>{{ $cart->quantity }}</strong> x <span class="price">₹{{ $cart->products->price }}.00</span>
			</div>
		</div>
		<div class="cart-content-bottom">
			<div class="clearfix">
				<a href="#" title="Remove" class="btn-remove btn-remove2" value="{{ $cart->product_id }}"><i class="icon-close icons"></i></a></div>
		</div>
	</li>	
	@php $total += $cart->products->price * $cart->quantity ; @endphp
	@endforeach
</ol>

@foreach($cartProducts as $cart)
	@if($cart->id == 0 )
		Cart is Empty.
	@else
		<p class="subtotal"> <span class="label">Subtotal:</span> <span class="price">{{ $total }}</span></p>
		@if(Auth::check())
			<div class="actions"> <a href="{{ url('cart') }}" class="view-cart"> View cart </a> <a href="{{ url('checkout/') }}">Checkout</a></div>
		@endif
	@endif
@endforeach

