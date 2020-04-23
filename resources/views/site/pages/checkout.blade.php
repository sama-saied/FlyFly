@extends('site.app')
@section('title', 'Checkout')
@section('content')
   <!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Check Out</h4>
			<div class="site-pagination">
				<a href="/">Home</a> 
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
                @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    <form class="checkout-form" action="{{ route('checkout.place.order') }}" method="POST" role="form">
                @csrf
						<div class="cf-title">Billing Information</div>
						<div class="row address-inputs">
                            <div class="col-md-6">
								<input type="text" placeholder="First name"  name="first_name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Last name"  name="last_name">
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Address" name="address">
                            </div>
                            <div class="col-md-6">
                            <input type="text" placeholder="Country" name="country">
                            </div>
                            <div class="col-md-6">
                            <input type="text" placeholder="City" name="city">
                            </div>
							<div class="col-md-6">
								<input type="text" placeholder="Zip code"  name="post_code">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone no." name="phone_number">
                            </div>
                            <div class="col-md-12">
                                    
                                    <input type="email" placeholder="Email address" name="email" value="{{ auth()->user()->email }}" enabled>
                                   
                            </div>
                                <div class="col-lg-4 order-1 order-lg-2">
                                   
                                    <textarea type="textarea" placeholder="Order Notes"  name="notes" rows="6"></textarea>
                                </div>
						</div>
						<div class="cf-title">Payment</div>
						<ul class="payment-list">
							<li>Paypal<a href="#"><img src="img/paypal.png" alt=""></a></li>
							<li>Credit / Debit card<a href="#"><img src="img/mastercart.png" alt=""></a></li>
							<li>Pay when you get the package</li>
						</ul>
						<button  type="submit" class="site-btn submit-order-btn">Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Cart</h3>
						<ul class="product-list">
							<li>
								<div class="pl-thumb"><img src="img/cart/1.jpg" alt=""></div>
								<h6>Animal Print Dress</h6>
								<p>$45.90</p>
							</li>
							<li>
								<div class="pl-thumb"><img src="img/cart/2.jpg" alt=""></div>
								<h6>Animal Print Dress</h6>
								<p>$45.90</p>
							</li>
						</ul>
						<ul class="price-list">
							<li>Total<span>$99.90</span></li>
							<li>Shipping<span>free</span></li>
							<li class="total">Total<span>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->
@stop