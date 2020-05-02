@extends('site.app')
@section('title', 'Make Order')
@section('content')
   <!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Order</h4>
			<div class="site-pagination">
				<a href="/">Home</a> 
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- order section  -->
	<section class="order-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" action="{{ route('checkout.place.order') }}" method="POST" role="form">
                @csrf
						<div class="cf-title">Order Information</div>
						<div class="row address-inputs">
                            <div class="col-md-6">
								
								<input type="text" placeholder="First name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ auth()->user()->first_name }}" enabled>
								@error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Last name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ auth()->user()->last_name }}" enabled>
							    @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-md-12">
								
								<input type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ auth()->user()->address }}" enabled>
								@error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
								<input type="text" placeholder="Country" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ auth()->user()->country }}" enabled>
								@error('country')
									<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
                            </div>
                            <div class="col-md-6">
								<input type="text" placeholder="City" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ auth()->user()->city }}" enabled>
								@error('city')
									<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
                            </div>
							<div class="col-md-6">
							
								<input type="text" placeholder="Zip code" class="form-control @error('post_code') is-invalid @enderror" name="post_code">
								@error('post_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone no." class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ auth()->user()->phone_number }}">
								@error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                    
								<input type="email" placeholder="Email address" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" enabled>
								@error('email')
							<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                                   
                            </div>
                                <div class="col-lg-4 order-1 order-lg-2">
                                   
                                    <textarea type="textarea" placeholder="Order Notes"  name="notes" rows="6"></textarea>
                                </div>
						</div>
						
						
						<button  type="submit" class="site-btn submit-order-btn">Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Cart</h3>
						@foreach(\Cart::getContent() as $item)
						<ul class="product-list">
							<li>
								<div class="pl-thumb">
									<a href="{{ asset('storage/'.$item->productImg) }}" data-fancybox="">
                                          <img class="product-big-img" src="{{ asset('storage/'.$item->productImg) }}" alt="">
									   </a>
								</div>
								<h6>{{ Str::words($item->name,20) }}</h6>
								<p>{{ $item->price }} {{config('settings.currency_symbol')}}</p>
							</li>
							
						</ul>
						@endforeach
                           <article class="card-body">
                                     <dl class="dlist-align">
                                         <dt class="total"><h5>Total :</h5>  </dt>
                                         <dd class="text-right h5 b" class="total"> {{ \Cart::getSubTotal() }} {{ config('settings.currency_symbol') }}</dd>
                                     </dl>
                            </article>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- order section end -->
@stop