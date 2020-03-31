<!DOCTYPE HTML>
<html lang="en">
<head>
<script src="frontdivi/js/jquery-3.2.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site.partials.styles')
</head>
<body>

<!-- Page Preloder -->
 <div id="preloder">
		<div class="loader"></div>
    </div>


@include('site.partials.header')
@yield('content')
@include('site.partials.footer')
@include('site.partials.scripts')
</body>
</html>