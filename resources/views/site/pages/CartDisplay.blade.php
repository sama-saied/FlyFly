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
						@if($bool == false)
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
							@foreach($carts ?? '' as $cart)
                                                  @if($cart->user_id == auth()->user()->id)
								<tr>
									<td class="product-col">
									
                                       <a href="{{ asset('storage/'.$cart->img) }}" data-fancybox="">
                                          <img class="product-big-img" src="{{ asset('storage/'.$cart->img) }}" alt="">
                                       </a>
									
										<div class="pc-title">
											<h4>{{ Str::words($cart->name,20) }}</h4>
											@foreach($attr as $atr )
											    @if($atr->cart_id == $cart->id)
                                                        <dl class="dlist-inline small">
                                                            <dt>{{ ucwords($atr->key_name) }}: </dt>
                                                            <dd>{{ ucwords($atr->value) }}</dd>
														</dl>
												@endif
														
                                            @endforeach
											
										</div>
									</td>
									<td class="quy-col">
										<div class="quantity">
					                        
												<p>{{ $cart->qty }}</p>
											
                    					</div>
									</td>
							      	@foreach($pro as $prod)
                                                           @if($cart->product_id == $prod->id)
                                                              @if($prod->sale_price)
									<td class="size-col"><h4>{{$prod->sale_price}} {{config('settings.currency_symbol')}}</h4>
									<small class="text-muted">each</small></td>
									<td class="total-col">
                                                      @else
                                                      <td class="size-col"><h4>{{$prod->price}} {{config('settings.currency_symbol')}}</h4>
									<small class="text-muted">each</small></td>
									<td class="total-col">
                                                      @endif
                                                          @endif
                                                  @endforeach
                                            <a href="{{ route('cart.delete', [$cart->id , auth()->user()->id]) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                        </td>
                                                </tr>
                                                @endif
								@endforeach
							</tbody>
						</table>
						</div>
						@endif
						<div class="total-cost">
							<h6>Total <span>{{ $total }} {{ config('settings.currency_symbol') }}</span></h6>
						</div>
						
					</div>
				</div>
				<div class="col-lg-4 card-right">
			    	<a href=" {{ route('cart.clear', auth()->user()->id) }} " class="site-btn">Clear Cart</a>
					<a href="/" class="site-btn">Continue shopping</a>
					<a href=" {{ route('order.new') }}" class="site-btn sb-dark">Proceed to checkout</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->
@endsection