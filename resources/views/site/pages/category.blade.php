@extends('site.app')                
@include('site.partials.styles')       
@section('title', $category->name)
@section('cat')
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>{{ $category->name }}</h4>
			<div class="site-pagination">
				<a href="/">Home</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
			@include('site.partials.sidebar')				
				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
                    @forelse($category->products as $product)
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">                          
								<div class="pi-pic">
                                    @if ($product->images->count() > 0)
                                    <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="">
                                    @else
                                <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                                    @endif
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
                                </div>
                                <div class="pi-text">
                                @if ($product->sale_price != 0)
                                <div class="tag-sale">ON SALE</div>
                                <div class="price-wrap h5">
                                        <span class="price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                        <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                    </div>
                                @else
                                    <div class="price-wrap h5">
                                    <h6> {{ config('settings.currency_symbol').$product->price }} </h6>
                                    </div>
                                @endif
									<p><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></p>
								</div>
							</div>
						</div>
                        @empty
                    <p>No Products found in {{ $category->name }}.</p>
                @endforelse
				</div>
			</div>
        </div>
	</div>
	</section>
	<!-- Category section end -->	
	

@endsection

