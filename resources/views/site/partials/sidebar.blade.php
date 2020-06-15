<div class="col-lg-3 order-2 order-lg-1">
	<div class="filter-widget">
	<h2 class="fw-title">-- Refine by</h2>
		<h2 class="fw-title">Categories</h2>
		<ul class="category-menu">
		@foreach($categories as $cat)
		@foreach($cat->items as $category)
		@if ($category->items->count() > 0) 

			<!--<li><a href="{/{ route('category.show', $category->slug) }}" id="{/{ $category->slug }}"  
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->

			<li><a   
			 aria-haspopup="true" aria-expanded="false">

			{{ $category->name }}</a>
				<ul class="sub-menu" aria-labelledby="{{ $category->slug }}">
				@foreach($category->items as $item)
						<a href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>
					@endforeach
				</ul>
			</li>
			@else
			<li>
				<ul class="sub-menu">
				<a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
				</ul>
			</li>
		@endif
	@endforeach
@endforeach
		</ul>
	</div>
	<div class="filter-widget mb-0">

		

	

		<div class="filter-widget">
		<h2 class="fw-title">Brand</h2>
		<ul class="category-menu">
		@foreach($brands as $category)
		 
			<li><a href="{{ route('brand.show', $category->slug) }}">{{ $category->name }}</a></li>
			
@endforeach
		</ul>
	</div>
		
	</div>
	
	
	</div>
	
