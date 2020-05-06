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

