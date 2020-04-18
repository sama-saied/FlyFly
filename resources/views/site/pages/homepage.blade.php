@extends('site.app')
@section('title', 'Homepage')

@section('content')

<body>
    <!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel"> 	
            <div class="hs-item set-bg" data-setbg="{{ asset('storage/'.$fi) }}">
				<div class="container">					
					<a href="{{ route('firstproductlink') }}" class="offer-card text-white">
                        <span> --- </span>
						<h3>SHOP NOW</h3>
						<p> </p>
                    </a>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="{{ asset('storage/'.$se) }}">
				<div class="container">
					<a href="{{ route('secondproductlink') }}" class="offer-card text-white">
                        <span> --- </span>
						<h3>SHOP NOW</h3>
						<p> </p>
                    </a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			
		<div class="product-slider owl-carousel">
		@foreach($product as $product)	
		<div class="product-item">
				
				@if($product->featured)
					<div class="pi-pic">
					@if ($product->images->count() > 0)
					<a href="{{ asset('storage/'.$product->images->first()->full) }}" data-fancybox="">
                        <img class="product-big-img" src="{{ asset('storage/'.$product->images->first()->full) }}" alt="">
                    </a>
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					@else
                   <div class="img-big-wrap">
                        <div>
                             <a href="https://via.placeholder.com/176" data-fancybox=""><img src="https://via.placeholder.com/176"></a>
                        </div>
                    </div>
                    @endif
					<div class="pi-text">
					<p><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></p>
					    @if ($product->sale_price != 0)
                                <div class="tag-sale">ON SALE</div>
                                <div class="price-wrap h5">
                                        <span class="price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                        <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                    </div>
                                @else
						<h6>{{ config('settings.currency_symbol').$product->price }}</h6>
						@endif
					</div>
					@endif
			
				</div>
				@endforeach
		</div>
	</div>
	</section>
	<!-- letest product section end -->

</body>

@stop