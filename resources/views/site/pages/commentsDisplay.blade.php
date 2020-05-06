<div class="comment-top-info">
		<div class="container">
        <div class="col-md-6">
            <h4>Customers Comments</h4>
            @foreach($comments as $comment)
    <div class="display-comment" style="margin-left:40px;"><br>
      -By <strong> {{ $comment->user->first_name }}  </strong> 
         <small> on {{$comment->created_at}}</small>
                    <br>
         <p>{{ $comment->body }}</p>
       
    </div>
@endforeach
                            
        <hr />
        <h4>add your comment</h4>
<br>
    <form  method="POST" action="{{ route('comments.store' ,  $product->id) }}" role="form" id="addComment">
                 {{ csrf_field() }}
                                @csrf
                <textarea type="textarea"  name="body" rows="14" ></textarea>
                <br><br>
                                <div class="form-group"> 
                                    <button type="submit" class="site-btn" value="Add Comment"><span> Add Comment</span></button>
                                </div>
        </form>
    </div>
                            
            
        </div>
</div>


@include('site.pages.rateDisplay', ['rating' => $product->rates])
<div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form action="{{ route('products.product') }}" method="POST">
                                        {{ csrf_field() }}
                                      
                                            <div class="container-fliud">
                                                <div class="wrapper row">
                                                    
                                                    <div class="details col-md-6">
                                                        <h3 class="product-title"> Rating </h3>
                                                        <div class="rating">
                                                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $product->userAverageRating }}" data-size="xs">
                                                            <input type="hidden" name="id" required="" value="{{ $product->id }}">
                                                            <br/>
                                                            <button class="btn btn-success">Submit Rate</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>


            @push('scripts')
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });
            $('.option').change(function () {
                $('#productPrice').html("{{ $product->sale_price != '' ? $product->sale_price : $product->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#productPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
            });
        });
    </script>

<script type="text/javascript">
    $("#input-id").rating();
</script>





<!--
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    -->

@endpush



