@extends('site.app')
@section('title', $product->name)
@section('pro')

       <!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>{{ $product->name }}</h4>
			<div class="site-pagination">
				<a href="/">Home</a> /
				
			</div>
		</div>
	</div>
	<!-- Page info end -->

	<!-- product section -->
	<section class="product-section" id="site">
		<div class="container">
			<div class="back-link">
				<a href="{{ url()->previous() }}"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
                    @if ($product->images->count() > 0)
                    <a href="{{ asset('storage/'.$product->images->first()->full) }}" data-fancybox="">
                        <img class="product-big-img" src="{{ asset('storage/'.$product->images->first()->full) }}" alt="">
                    </a>
					</div>
                    @else
                   <div class="img-big-wrap">
                        <div>
                             <a href="https://via.placeholder.com/176" data-fancybox=""><img src="https://via.placeholder.com/176"></a>
                        </div>
                    </div>
                    @endif
				
				@if ($product->images->count() > 0)
				<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
				@foreach($product->images as $image)
						<div class="product-thumbs-track">
							<div class="pt active" ><img src="{{ asset('storage/'.$image->full) }}" alt=""></div>
						</div>
				@endforeach
					</div>
				@endif
				</div>
				<div class="col-lg-6 product-details">
                    <h2 class="p-title">{{ $product->name }}</h2>
                    @if ($product->sale_price > 0)
                    <h3 class="p-price">
                          <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->sale_price }}</span>
                          <del class="price-old"> {{ config('settings.currency_symbol') }}{{ $product->price }}</del>
                    </h3>
                    @else

					<h3 class="p-price">
                    <span class="currency">{{ config('settings.currency_symbol') }}</span>
                    <span class="num" id="productPrice">{{ $product->price }}</span>
                    </h3>
                    @endif
                    @if ($product->status == 1)
                    <h3 class="p-stock">Available:
						@if($product->quantity <= 5)
						 <span>In Stock with {{ $product->quantity }} left</span>
						 @else
						 <span>In Stock</span>
						 @endif</h3>
                    @else
                    <h3 class="p-stock">Available: <span>Out of stock</span></h3>
                    @endif
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div>
                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                   
                                                    @foreach($attributes as $attribute)
                                                        @php $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                                        
                                                            <tr><td>
                                                        @if ($attributeCheck) 
															<dt>{{ $attribute->name }}: </td></tr></dt>
											
                                                        
                                                            <dd>
                                                                <select class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}">
                                                                    <option data-price="0" value="0"> Select a {{ $attribute->name }}</option>
                                                                    @foreach($product->attributes as $attributeValue)
                                                                        @if ($attributeValue->attribute_id == $attribute->id)
                                                                            <option
                                                                                data-price="{{ $attributeValue->price }}"
                                                                                value="{{ $attributeValue->value }}"> {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
															</dd>
															@else
														<dt>            </td></tr></dt>
														
                                                        @endif
                                                    @endforeach
                                                </dl>
                                            </div>
                                        </div>
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty">
                            <input  type="text" min="1" value="1" max="{{ $product->quantity }}" name="qty" >
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">                          
                        </div>
                    </div>
                    <button type="submit" class="site-btn"><span>ADD TO CART</span></button>
                    </form>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Discreption</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>{!! $product->description !!}</p>
									
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="./img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						
						<a href="{{ route('admin.settings.insta')}}"><i class="fa fa-instagram"></i></a>
						<a href="{{ route('admin.settings.facebook')}}"><i class="fa fa-facebook"></i></a>
						<a href="{{ route('admin.settings.twitter')}}"><i class="fa fa-twitter"></i></a>
						<a href="{{ route('admin.settings.youtube')}}"><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div> 
	</section>
    <!-- product section end -->
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });
            $('.option').change(function () {
                $('#productPrice').html("{{ $product->sale_price != '' ? $product->sale_price : $product->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#productPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
            });
        });
    </script>
@endpush
