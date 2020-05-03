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
                          
                          <span class="num" id="productPrice">{{ $product->sale_price }}</span>
                          <samll><span class="currency">{{ config('settings.currency_symbol') }}</span></samll>
                           <small><del class="price-old"> {{ $product->price }} {{ config('settings.currency_symbol') }}</del></small>      
                    </h3>
                   
                    @else

					<h3 class="p-price">
                    
                    <span class="num" id="productPrice">{{ $product->price }}</span>
                    <span class="currency">{{ config('settings.currency_symbol') }}</span>
                    </h3>
                    @endif
                    @if ($product->quantity > 0)
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
                   <!-- <form action="{/{route('cartt.store' ,  $product->id) }}" method="POST" role="form" id="addToCart">-->
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
										<div class="row">
                                            <div class="col-sm-12">					
					                        	<dl class="dlist-inline">
                                                    <dt>Quantity: </dt>
                                                    <dd>
                                                        <input class="quantity" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:70px;">
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                                                    </dd>
                                                </dl>
                                         </div>  </div>
                                        
                    <button type="submit" class="site-btn"><span>ADD TO CART</span></button><br><br>
                   
                                        
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
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<p>{!! $product->shipping !!}</p>
								</div>
							</div>
                        </div>
                        
                        <div>
                            <h4>Display Comments</h4>
                              
                            @include('site.pages.commentsDisplay', ['comments' => $product->comments, 'product_id' => $product->id])
                            
                            <div>
                            <hr />
                            <h4>Add comment</h4>
                            <form method="post" action="{{ route('comments.store' ,  $product->id) }}" role="form" id="addComment">
                                {{ csrf_field() }}
                                @csrf
                                <div class="form-group">
                                <textarea class="form-control" name="body" ></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block" value="Add Comment"> Add Comment</button>
                                </div>
                            </form>
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

<script type="text/javascript">
    $("#input-id").rating();
</script>


<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
@endpush
