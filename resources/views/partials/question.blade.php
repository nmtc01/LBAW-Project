<div class="row flex-row-reverse">
    <div class="col-sm-9">
        <h1 id="question_title">{{ $question->title }}</h1>
        @if (Auth::check() && Auth::user()->id == $question->user_id)
        <a class="icon-question" id="delete_question">
            <i class="fas fa-trash-alt"> Delete</i>
        </a>
        <a class="icon-question" id="edit_question">
            <i class="fas fa-edit"> Edit</i>
        </a>
        <a class="icon-question" id="save_question">
            <i class="fas fa-save"> Save</i>
        </a>
        @endif
    </div>
    <div id="prof-img" class="col-sm-3 text-center">
        <a class="row-sm" href="profile.php">
            <img src="{{asset('/img/unknown.png')}}" alt="Generic placeholder image">
        </a>
        <p class="row-sm text-truncate"><a href="profile.php">{{ $user->username }}</a></p>
    </div>
</div>
<div>
    <p id="question_description">{{ $question->description }}</p>
    @foreach ($labels as $label)
    <a class="badge badge-dark badge-pill" id="question_label">{{ $label->name }}</a>
    @endforeach
    <div class=icons>

        @if($vote != null)

            @if($vote->vote)
            <a class="icon" >
                <i class="fas fa-thumbs-up fa-lg" id="like1P"> {{ $question->nr_likes }}</i>
            </a>
            @else
        <a class="icon" >
                <i class="fas fa-thumbs-up fa-lg" id="like1"> {{ $question->nr_likes }}</i>
            </a>
            @endif
            @if(!$vote->vote)
            <a class="icon" >
                <i class="fas fa-thumbs-down fa-lg" id="dislike1P"> {{ $question->nr_dislikes }}</i>
            </a>
            @else
            <a class="icon" >
                <i class="fas fa-thumbs-down fa-lg" id="dislike1"> {{ $question->nr_dislikes }}</i>
            </a>
            @endif
        @else
        <a class="icon" >
                <i class="fas fa-thumbs-up fa-lg" id="like1"> {{ $question->nr_likes }}</i>
            </a>
        <a class="icon" >
                <i class="fas fa-thumbs-down fa-lg" id="dislike1"> {{ $question->nr_dislikes }}</i>
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
                <i class="fas fa-arrow-right fa-lg" id="unfollowQ"> unfollow </i>
            @else
                <i class="fas fa-arrow-right fa-lg" id="followQ"> follow </i>
            @endif
        </a>
        @endif
        <a class="icon-answers">
            <i class="fas fa-bug"> Report</i>
        </a>
    </div>
</div>