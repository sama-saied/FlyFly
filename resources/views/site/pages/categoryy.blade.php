@extends('site.app')
@section('content')

@include('site.partials.herosection')

@stop

@push('scripts')

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

@endpush