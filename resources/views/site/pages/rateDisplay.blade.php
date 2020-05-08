@extends('site.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-heading">Rates</div>

                <div class="panel-body">

                    <table class="table table-bordered">

                        <tr>   
                            <th>Product Name</th>
                            <th width="400px">Average Rating</th>
                        </tr>

                        @if($products->count())

                            @foreach($products as $products)

                            <tr>
                                  <td> {{$products->name}} </td>
                                <td>

                                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $products->averageRating }}" data-size="xs" disabled="">

                                </td>

                            </tr>

                            @endforeach

                        @endif

                    </table>



                </div>

            </div>

        </div>

    </div>

</div>

@push('scripts')
   
<script type="text/javascript">
    $("#input-id").rating();
</script>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">



<!--<link href="http://netdna.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.css" rel="stylesheet">-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

 
<link href="{{ asset('css/preview.css') }}" rel="stylesheet">
@endpush


@endsection
