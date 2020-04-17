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
</body>

@stop