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
        <a class="icon" >
            <i class="fas fa-thumbs-up fa-lg" id="like1"> {{ $question->nr_likes }}</i>
        </a>
        <a class="icon" >
            <i class="fas fa-thumbs-down fa-lg" id="dislike1"> {{ $question->nr_dislikes }}</i>
        </a>
        <a class="icon">
            @php
            $flag = false;
            @endphp
            @for ($j = 0; $j < count($questions_followed); $j++)
                @if($questions_followed[$j]->id == $question->id)
                    @php
                    $flag = true;
                    @endphp
                @endif
            @endfor
            @if($flag)
                <i class="fas fa-arrow-right fa-lg" id="unfollow2"> unfollow </i>
            @else
                <i class="fas fa-arrow-right fa-lg" id="follow2"> follow </i>
            @endif
            {{--<i class="fas fa-arrow-right fa-lg" id="follow2"> follow</i>--}}
        </a>
        <a class="icon-answers">
            <i class="fas fa-bug"> Report</i>
        </a>
    </div>
</div>