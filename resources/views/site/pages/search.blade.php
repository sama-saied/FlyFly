@extends('site.app')
@section('title', 'Search')
@section('search')
<!-- Page info -->
<div class="page-top-info">
		<div class="container">
			<h4>search result</h4>
			<div class="site-pagination">
				<a href="/">Home</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->
	<section>
@if(isset($searchResults))
						@if ($searchResults-> isEmpty())
							<h4> Sorry, no results found for the term <b>"{{ $searchterm }}"</b>.</h4>
						@else
						<br>
							<h5>    There are {{ $searchResults->count() }} results for the term "{{ $searchterm }}"</h5>
							<hr />
							@foreach($searchResults->groupByType() as $type => $modelSearchResults)
			<div class="banner-bottom">
		<div class="container">
        <div class="col-md-7 wthree_banner_bottom_right">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
	
					<ul id="myTab" class="nav nav-tabs" role="tablist">
				
					<h4>  <li role="presentation" class="active">{{ ucwords($type) }}</li></h4>
                    </ul>
                    <div id="myTabContent" class="tab-content" >
                    <div role="tabpanel" class="tab-pane fade active in" id="home" >
                    <div class="agile_ecommerce_tabs">
					@foreach($modelSearchResults as $searchResult)
                    
						
							
								<div class="col-md-4 agile_ecommerce_tab_left">
                               
									<h5><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></h5>
									
								</div>
							
                           
							@endforeach

                        </div>
                        </div>
                    
                    
                     </div>
            </div>
        </div>
	</div>
</div>
@endforeach
						@endif
					@endif
					@include('site.partials.new')
	</section>
@endsection




@push('scripts')
     <script src="{{asset('web/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
     <script src="{{asset('web/js/jquery.countdown.js')}}"></script>
				<script src="{{asset('web/js/script.js')}}"></script>
				
                
     <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});


						
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});


					</script>
     @endpush