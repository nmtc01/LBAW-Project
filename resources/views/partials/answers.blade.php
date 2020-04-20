<h2 class="mt-0">Answers</h2>
            
<ul class="list-unstyled">
    @foreach($answers as $answer)
    <li id="answer">
        <div class="row">
            <a class="col-sm-3 d-none d-sm-block text-center" href="../pages/profile.php">
                <img src="{{ asset('img/unknown.png') }}" alt="Generic placeholder image">
            </a>
            <div class="col-sm-9">
                <span class="badge badge-success"><i class="fas fa-star"></i>Score {{ $userAnswers[$answer->id]->score }}</span>
                <p id="user_ans"><a href="../pages/profile.php">{{ $userAnswers[$answer->id]->username }}</a></p>
            </div>
        </div>
        <div class="ans-body">
            <p>{{ $answer->content }}</p>
            <div class=icons-answers>
                <a class="icon-answers" href="#">
                    <i class="fas fa-thumbs-up">{{ $answer->nr_likes }}</i>
                </a>
                <a class="icon-answers" href="#">
                    <i class="fas fa-thumbs-down">{{ $answer->nr_dislikes }}</i>
                </a>
                <a class="icon-answers" href="#">
                    <i class="fas fa-comment">0</i>
                </a>
                <a class="icon-answers" href="#">
                    <i class="fas fa-bug"> Report</i>
                </a>
                @if (Auth::check() && Auth::user()->id == $answer->user_id)
                <a>
                    <i class="fas fa-trash-alt"></i>
                </a>
                @endif
            </div>
        </div>
    </li>
    @endforeach
</ul>