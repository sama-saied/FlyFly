<!DOCTYPE HTML>
<html lang="en">
<head>
<script src="{{asset('frontdivi/js/jquery-3.2.1.min.js')}}"></script>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') - {{ 'Fly Buy' }}</title>
    @include('site.partials.styles')
</head>
<body>

<!-- Page Preloder -->
 <div id="preloder">
		<div class="loader"></div>
    </div>


@include('site.partials.header')
@yield('cat')
@yield('cart')
@yield('pro')
@yield('rate')
@yield('check')
@yield('search')
@yield('content')
@include('site.partials.footer')
@include('site.partials.scripts')
</body>
</html>