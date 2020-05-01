@foreach($categories as $cat)
                    @foreach($cat->items as $category)
                        @if ($category->items->count() > 0)
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