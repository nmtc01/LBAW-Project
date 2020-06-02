<div>
    <!-- Modal -->
    <div class="modal fade" id="deleteQuestionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete it?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="delete_question" type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="row flex-row-reverse">
    <div class="col-sm-9">
        <h1 id="question_title">{{ $question->title }}</h1>
        @if (Auth::check())
            @if (Auth::user()->getUserCurrentRole() == 'administrator' || 
                 Auth::user()->id == $question->user_id)
        <a class="icon-question" id="delete-question-btn" data-toggle="modal" data-target="#deleteQuestionModal">
            <i class="fas fa-trash-alt"> Delete</i>
        </a>
            @endif
            @if (Auth::user()->getUserCurrentRole() == 'administrator' || 
                 Auth::user()->getUserCurrentRole() == 'moderator' || 
                 Auth::user()->id == $question->user_id)
        <a class="icon-question" id="edit_question">
            <i class="fas fa-edit"> Edit</i>
        </a>
        <a class="icon-question" id="save_question">
            <i class="fas fa-save"> Save</i>
        </a>
            @endif
        @endif
    </div>
    <div id="prof-img" class="col-sm-3 text-center">
        <a class="row-sm" href="{{ asset('/user/'.$question->user_id) }}">
            <img src="{{asset('/img/unknown.png')}}" alt="Generic placeholder image">
        </a>
        <p class="row-sm text-truncate" id="username-question"><a href="{{ asset('/user/'.$user->id) }}">{{ $user->username }}</a></p>
    </div>
</div>
@if ($user->getUserCurrentRole() == 'banned')
<div class="alert alert-danger">
    The owner of this question was banned due to inappropriate behavior.
</div>
@elseif ($user->getUserCurrentRole() == 'deleted')
<div class="alert alert-danger">
    The owner of this question deleted the account.
</div>
@endif
<div>
    <p id="question_description">{{ $question->description }}</p>
    @foreach ($labels as $label)
    <a class="badge badge-dark badge-pill labels" id="question_label{{ $label->id }}" data-id="{{ $label->id }}">{{ $label->name }}</a>
    @endforeach
    <div class=icons>

        @if($vote != null)

            @if($vote->vote)
            <a class="icon" >
                <i class="fas fa-thumbs-up fa-lg like1P"> {{ $question->nr_likes }}</i>
            </a>
            @else
        <a class="icon" >
                <i class="fas fa-thumbs-up fa-lg like1"> {{ $question->nr_likes }}</i>
            </a>
            @endif
            @if(!$vote->vote)
            <a class="icon" >
                <i class="fas fa-thumbs-down fa-lg dislike1P"> {{ $question->nr_dislikes }}</i>
            </a>
            @else
            <a class="icon" >
                <i class="fas fa-thumbs-down fa-lg dislike1"> {{ $question->nr_dislikes }}</i>
            </a>
            @endif
        @else
        <a class="icon" >
                <i class="fas fa-thumbs-up fa-lg like1"> {{ $question->nr_likes }}</i>
            </a>
        <a class="icon" >
                <i class="fas fa-thumbs-down fa-lg dislike1"> {{ $question->nr_dislikes }}</i>
            </a>
        @endif
        @if(Auth::check())
        <a class="icon">
            @php
            $flag = false;
            @endphp
            @foreach ($questions_followed as $question_followed)
                @if($question_followed->id == $question->id)
                    @php
                    $flag = true;
                    @endphp
                @endif
            @endforeach
            @if($flag)
                <i class="fas fa-arrow-right fa-lg unfollowQ"> unfollow </i>
            @else
                <i class="fas fa-arrow-right fa-lg followQ"> follow </i>
            @endif
        </a>
        @endif
        <a class="icon-answers">
            <i class="fas fa-bug" data-toggle="modal" data-target="#report_something"> Report</i>
        </a>
    </div>
</div>