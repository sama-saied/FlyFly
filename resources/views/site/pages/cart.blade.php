@extends('site.app')
@section('title', 'Shopping Cart')
@section('cart')
    <!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3>
						@if (\Cart::isEmpty())
                        <p>Your shopping cart is empty.</p>
                    @else
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Product</th>
									<th class="quy-th">Quantity</th>
									<th class="size-th">Price</th>
									<th class="total-th">Remove</th>
									
								</tr>
							</thead>
							<tbody>
							@foreach(\Cart::getContent() as $item)
								<tr>
								<td class="product-col">
									<div class="product-pic-zoom">
								
									<a href="{{ asset('storage/'.$item->productImg) }}" data-fancybox="">
										<img src="{{ asset('storage/'.$item->productImg) }}" alt="">
									</a>
									</div>
									
										<div class="pc-title">
											<h4>{{ Str::words($item->name,20) }}</h4>
											@foreach($item->attributes as $key  => $value)
											
                                                        <dl class="dlist-inline small">
                                                            <dt>{{ ucwords($key) }}: </dt>
                                                            <dd>{{ ucwords($value) }}</dd>
														</dl>
														
                                                    @endforeach
											
										</div>
									</td>
									<td class="quy-col">
										<div class="quantity">
					                        
												<p>{{ $item->quantity }}</p>
											
                    					</div>
									</td>
									
									<td class="size-col"><h4>{{ $item->price }} {{config('settings.currency_symbol')}}</h4>
									<small class="text-muted">each</small></td>
									<td class="total-col">
                                            <a href="{{ route('checkout.cart.remove', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                        </td>
								</tr>
								@endforeach
							</tbody>
						</table>
						</div>
						@endif
						<div class="total-cost">
							<h6>Total <span>{{ \Cart::getSubTotal() }} {{ config('settings.currency_symbol') }}</span></h6>
						</div>
						
					</div>
				</div>
				<div class="col-lg-4 card-right">
			    	<a href="{{ route('checkout.cart.clear') }}" class="site-btn">Clear Cart</a>
					<a href="/" class="site-btn">Continue shopping</a>
					<a href=" {{ route('order.index') }}" class="site-btn sb-dark">Proceed to checkout</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->
@endsection