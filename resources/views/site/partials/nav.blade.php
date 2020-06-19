<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                @foreach($categories as $cat)
                    @foreach($cat->items as $category)
                        @if ($category->items->count() > 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                                    @foreach($category->items as $item)
                                        <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</nav>
-->






<nav class="header-section">
    <div class="main-navbar">
		<div class="container">
				<!-- menu -->
			<ul class="main-menu">
            <li><a href="/">Home</a></li>
                @foreach($categories as $cat)
                    @foreach($cat->items as $category)
                        @if ($category->items->count() > 0)
                        <li>
                         <a  href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                            <ul class="sub-menu">
                                <div  aria-labelledby="{{ $category->slug }}">
                                    @foreach($category->items as $item)
                                     <li>   <a href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a></li>
                                    @endforeach
                                </div>
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
    </div>
</nav>