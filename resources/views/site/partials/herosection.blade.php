@foreach($categories as $cat)
                    @foreach($cat->items as $category)
                        @if ($category->items->count() > 0 && $category->featured )
<div class="banner-bottom">

		<div class="container">
        <div class="col-md-7 wthree_banner_bottom_right">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
					  <li role="presentation" class="active"><a href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}" 
                             role="tab" data-toggle="tab" aria-controls="home">{{ $category->name }}</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content" >
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="{{ $category->slug }}">
                    <div class="agile_ecommerce_tabs">
                    @foreach($category->items as $item)
                    
						
							
								<div class="col-md-4 agile_ecommerce_tab_left">
                                <div >
										<img src="{{ asset('storage/'.$item->image) }}" alt=" " class="img-responsive" />
										
										
									</div> 
									<h5><a href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a></h5>
									<div class="simpleCart_shelfItem">
										<form action="{{ route('category.show', $item->slug) }}">
											 <p>
											<button type="submit" class="w3ls-cart">Shop Now</button></p>
										</form>  
                                    </div>
								</div>
							
                           
							@endforeach

                        </div>
                        </div>
                    
                    
                     </div>
            </div>
        </div>
	</div>
</div>
@endif
  @endforeach
    @endforeach
	
    <div class="banner-bottom">
		<div class="container">
			<div class="col-md-5 wthree_banner_bottom_left">
				
					
            </div>
            <div class="banner-bottom1">
		<div class="agileinfo_banner_bottom1_grids">
        
            <div class="clearfix"> </div>
            </div>
         </div>
     </div>
    </div>
    

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
					</script>
     @endpush