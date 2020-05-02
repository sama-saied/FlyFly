@foreach($comments as $comment)
    <div class="display-comment" style="margin-left:40px;"><br>
        <strong>{{'User Name : '}}{{ $comment->user->first_name }}{{'  '}}{{ $comment->user->last_name }}</strong>
        <p><b>{{ $comment->body }}</b></p>
    </div>
@endforeach