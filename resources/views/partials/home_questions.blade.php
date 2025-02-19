<div class="col-md-6 container-fluid">
    <a @if(!Auth::check()) href="{{ asset('login') }}" @endif>
        <div id="add_btn" class="input-button" @if(Auth::check())data-toggle="modal" data-target="#ask_something"@endif>
            What is your question?
        </div>
    </a>
    @for($i = 0; $i < count($questions); $i++)
    <div class="wrapper home_question container-fluid questions-list" data-id="{{$questions[$i]->id}}">
        <div class="row mb-3">
            <div class="col-3 text-center">
                <img src="{{asset('/img/' . $users[$questions[$i]->id]->photo_path)}}" alt="user image">
                <p><a class="row-2 d-none d-sm-block" href="{{ asset('/user/'.$users[$questions[$i]->id]->id) }}">{{$users[$questions[$i]->id]->username}}</a></p>
            </div>
            <div class="col-9">
                <h1><a class="question-header" href="{{ asset('question/'.$questions[$i]->id) }}">{{$questions[$i]->title }}</a></h1>
                <div class="module brief-description">
                    <p>{{ $questions[$i]->description }}</p>
                    <div class="more-btn-div">
                        <div>
                            <a href="{{ asset('question/'.$questions[$i]->id) }}">(...)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="icons col-9">

                @if($questionsVotes[($questions[$i])->id] != null)

                    @if($questionsVotes[($questions[$i])->id]->vote == 1)
                        <a class="icon" >
                            <i class="fas fa-thumbs-up fa-lg like3P"> {{ $questions[$i]->nr_likes }}</i>
                        </a>
                        <a class="icon" >
                            <i class="fas fa-thumbs-down fa-lg dislike3"> {{ $questions[$i]->nr_dislikes }}</i>
                        </a>
                    @else
                        <a class="icon" >
                            <i class="fas fa-thumbs-up fa-lg like3"> {{ $questions[$i]->nr_likes }}</i>
                        </a>
                        <a class="icon" >
                            <i class="fas fa-thumbs-down fa-lg dislike3P"> {{ $questions[$i]->nr_dislikes }}</i>
                        </a>
                    @endif

                @else
                    <a class="icon" >
                        <i class="fas fa-thumbs-up fa-lg like3"> {{ $questions[$i]->nr_likes }}</i>
                    </a>
                    <a class="icon" >
                        <i class="fas fa-thumbs-down fa-lg dislike3"> {{ $questions[$i]->nr_dislikes }}</i>
                    </a>
                @endif
                <a class="icon" href="#">
                    <i class="fas fa-reply fa-lg"> {{ isset($nr_answers[$questions[$i]->id]) ?  $nr_answers[$questions[$i]->id] : 0}} </i>
                </a>
                @if (Auth::check())
                <a class="icon">
                    @php
                    $flag = false;
                    @endphp
                    @foreach ($questions_followed as $question_followed)
                        @if($question_followed->id == $questions[$i]->id)
                            @php
                            $flag = true;
                            @endphp
                        @endif
                    @endforeach
                    @if($flag)
                        <i class="fas fa-arrow-right fa-lg unfollowH"> unfollow </i>
                    @else
                        <i class="fas fa-arrow-right fa-lg followH"> follow </i>
                    @endif
                </a>
                @endif
            </div>
            <p class="col-3 question_date">{{ $questions[$i]->question_date }}</p>
        </div>
    </div>
    @endfor
    <div class="d-flex flex-row-reverse">
    {{ $questions->links() }}
    </div>
</div>