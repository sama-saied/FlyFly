@extends('site.app')                  
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
										<a href="{{ route('product.show', $product->slug) }}" class="add-card"><i class="flaticon-bag"></i><span>SHOP NOW</span></a>
										<br>
									</div>
                                </div>
                                <div class="pi-text">
								<p><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></p>
                                @if ($product->sale_price != 0)
                                <div class="tag-sale">ON SALE</div>
                                <div class="price-wrap h5">
                                        <span class="price"> {{ $product->sale_price }} {{ config('settings.currency_symbol')}} </span>
									
									<del class="price-old"> {{ $product->price }} {{ config('settings.currency_symbol')}}</del>
									</div> <br>
							 @else
                                    <div class="price-wrap h5">
                                    <p> {{ $product->price }} {{ config('settings.currency_symbol')}} </p>
                                    </div> <br>
                                @endif
									
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

