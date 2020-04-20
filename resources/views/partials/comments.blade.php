<h2 class="mt-0">Comments</h2>

<div class="media-body">
    @foreach ($comments as $comment)
    <div class="comment">
        <p>
            <a href="profile.php" class="username">{{ $userComments[$comment->id]->username}} </a>
            <a class="icon-answers" href="#">
                <i class="fas fa-bug"> Report</i>
            </a>
            <br>
            {{ $comment->content }}
        </p>
    </div>
    @endforeach
</div>  