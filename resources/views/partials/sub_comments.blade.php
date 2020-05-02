<div class="form-group" id="add_comment_form">
    <label for="exampleFormControlTextarea2"></label>
    <input class="form-control" placeholder="Do you want to comment this answer?"id="exampleFormControlTextarea3">
    <button class="btn my-2 my-sm-0" id="subcomment-button" type="submit">Comment</button>
</div>
<div class="media-body" id="subcomments-list">
    @foreach ($subComments[$answer->id] as $comment)
    <div id="comment{{$comment->id}}" class="comment" data-id = "{{$comment->id}}">
        <div>
            <a href="profile.php" class="username">{{ $userSubComments[$comment->id]->username }}</a>
            <a class="icon-comments">
                <i class="fas fa-bug"> Report</i>
            </a>
            @if (Auth::check() && Auth::user()->id == $comment->user_id)
            <a class="icon-comments edit_comment_btn" id="edit_comment{{$comment->id}}">
                <i class="fas fa-edit"> Edit</i>
            </a>
            <a class="icon-comments save_comment_btn" id="save_comment{{$comment->id}}">
                <i class="fas fa-save"> Save</i>
            </a>
            <a class="icon-comments" id="delete_comment">
                <i class="fas fa-trash-alt"></i>
            </a>
            @endif
            <br>
            <p id="comment_content">
                {{ $comment->content }} 
            </p>
        </div>
    </div>
    @endforeach
</div>  