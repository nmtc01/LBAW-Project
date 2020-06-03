<h2 class="mt-0">Answers</h2>
            
<ul class="list-unstyled" id="answers-list">
    @foreach($answers as $answer)
    <li id="answer{{$answer->id}}" class="answer_item" data-id = "{{$answer->id}}">
        @if(Auth::check() && Auth::user()->username == $user->username)
            <div class="best-answer">
                <a role="button" class="icon-best-answer">
                    @if($answer->marked_answer)
                    <i class="fas fa-check-circle" id="best-answer-green"> Set as best answer </i>
                    @else
                    <i class="fas fa-check-circle" id="best-answer-black"> Set as best answer</i>
                    @endif
                </a>
            </div>
        @else
            @if($answer->marked_answer)
                <div class="best-answer">
                    <a role="button" class="icon-best-answer">
                        <i class="fas fa-check-circle" id="best-answer-green"></i>
                    </a>
                </div>
            @endif
        @endif
        <div class="row">
            <a class="col-sm-3 d-none d-sm-block text-center" href="{{ asset('/user/'.$userAnswers[$answer->id]->id) }}">
                <img src="{{asset('/img/' . $userAnswers[$answer->id]->photo_path)}}" alt="user image">
            </a>
            <div class="col-sm-9">
                <span class="badge badge-success"><i class="fas fa-star"></i>Score {{ $userAnswers[$answer->id]->score }}</span>
                <p id="user_ans"><a href="{{ asset('/user/'.$userAnswers[$answer->id]->id) }}">{{ $userAnswers[$answer->id]->username }}</a></p>
            </div>
        </div>
        <div class="ans-body">
            <p id="answer_content">{{ $answer->content }}</p>
            <div class=icons-answers>
                
                @if($answersVotes != null && $answersVotes[$answer->id] != null)

                    @if(($answersVotes[$answer->id])->vote == true)
                    <a role="button" class="icon-answers" >
                        <i class="fas fa-thumbs-up like2P"> {{ $answer->nr_likes }}</i>
                    </a>
                    <a role="button" class="icon-answers"  >
                        <i class="fas fa-thumbs-down dislike2"> {{ $answer->nr_dislikes }}</i>
                    </a>
                    @else
                    <a role="button" class="icon-answers">
                        <i class="fas fa-thumbs-up like2"> {{ $answer->nr_likes }}</i>
                    </a>
                    <a role="button" class="icon-answers" >
                        <i class="fas fa-thumbs-down dislike2P"> {{ $answer->nr_dislikes }}</i>
                    </a>

                    @endif
                    

                @else
                <a role="button" class="icon-answers" >
                    <i class="fas fa-thumbs-up like2"> {{ $answer->nr_likes }}</i>
                </a>
                <a role="button" class="icon-answers"  >
                    <i class="fas fa-thumbs-down dislike2"> {{ $answer->nr_dislikes }}</i>
                </a>
                @endif
                <a class="icon-answers" data-toggle="collapse" href="#collapsed_comments{{$answer->id}}">
                    <i class="fas fa-comment"> {{ count($subComments[$answer->id]) }}</i>
                </a>
                <a role="button" class="icon-answers" data-toggle="collapse" data-target="#collapseReportAnswer{{$answer->id}}" aria-expanded="false">
                    <i class="fas fa-bug"> Report</i>
                </a>
                @if (Auth::check())
                    @if (Auth::user()->getUserCurrentRole() == 'administrator' ||
                         Auth::user()->getUserCurrentRole() == 'moderator' ||
                         Auth::user()->id == $answer->user_id)
                <a role="button" class="icon-answers edit_answer_btn" id="edit_answer{{$answer->id}}">
                    <i class="fas fa-edit"> Edit</i>
                </a>
                <a role="button" class="icon-answers save_answer_btn" id="save_answer{{$answer->id}}">
                    <i class="fas fa-save"> Save</i>
                </a>
                    @endif
                    @if (Auth::user()->getUserCurrentRole() == 'administrator' ||
                         Auth::user()->id == $answer->user_id)
                <a role="button" class="icon-answers" id="delete_answer">
                    <i class="fas fa-trash-alt"></i>
                </a>
                    @endif
                @endif
            </div>
        </div>
        <div class="collapse" id="collapsed_comments{{$answer->id}}">
            <div class="card card-body">
                @include('partials.sub_comments')
            </div>
        </div>
        <div class="collapse collapsed_report" id="collapseReportAnswer{{$answer->id}}">
            <div class="card card-header">
                <h5>Help us</h5>
            </div>
            <div class="card card-body">
                <form>
                    <div class="form-group">
                        <label for="formControlTextareaQuestion">Write here a brief description of the problem</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary report_answer" data-toggle="collapse" data-target="#collapseReportAnswer{{$answer->id}}">Send</button>
            </div>
        </div>
    </li>
    @endforeach
</ul>