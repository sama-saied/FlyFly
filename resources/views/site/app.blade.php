<!DOCTYPE HTML>
<html lang="zxx">
<head>
<script src="{{asset('frontdivi/js/jquery-3.2.1.min.js')}}"></script>
<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>@yield('title') - {{ config('app.name') }}</title>
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
@yield('content')
@include('site.partials.footer')
@include('site.partials.scripts')
</body>
</html>