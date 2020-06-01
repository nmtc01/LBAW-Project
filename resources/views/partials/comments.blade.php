<h2 class="mt-0">Comments</h2>

<div class="media-body" id="comments-list">
    @foreach ($comments as $comment)
    <div id="comment{{$comment->id}}" class="comment" data-id = "{{$comment->id}}">
        <div class="content">
            <a href="{{ asset('/user/'.$userComments[$comment->id]->id) }}" class="username">{{ $userComments[$comment->id]->username}} </a>
            <a class="icon-comments" data-toggle="collapse" data-target="#collapseReportComment{{$comment->id}}" aria-expanded="false">
                <i class="fas fa-bug"> Report</i>
            </a>
            @if (Auth::check())
                @if(Auth::user()->getUserCurrentRole() == 'administrator' || 
                    Auth::user()->getUserCurrentRole() == 'moderator' || 
                    Auth::user()->id == $comment->user_id)
            <a class="icon-comments edit_comment_btn" id="edit_comment{{$comment->id}}">
                <i class="fas fa-edit"> Edit</i>
            </a>
            <a class="icon-comments save_comment_btn" id="save_comment{{$comment->id}}">
                <i class="fas fa-save"> Save</i>
            </a>
                @endif
                @if(Auth::user()->getUserCurrentRole() == 'administrator' || Auth::user()->id == $comment->user_id)
            <a class="icon-comments" id="delete_comment">
                <i class="fas fa-trash-alt"></i>
            </a>
                @endif
            @endif
            <br>
            <p id="comment_content">
                {{ $comment->content }}
            </p>
        </div>
        <div class="collapse collapsed_report" id="collapseReportComment{{$comment->id}}">
            <div class="card card-header">
                <h5>Help us</h5>
            </div>
            <div class="card card-body">
                <form>
                    <div class="form-group">
                        <label for="formControlTextareaQuestion">Write here a brief description of the problem</label>
                        <textarea class="form-control" rows="2"></textarea>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary report_comment" data-toggle="collapse" data-target="#collapseReportComment{{$comment->id}}">Send</button>
            </div>
        </div>
    </div>
    @endforeach
</div>  