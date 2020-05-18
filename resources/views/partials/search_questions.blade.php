<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Filters
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body filters">
                <form>
                    <div id="filters-bar container row">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Answered
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        Positive Score +
                                    </label>
                                </div>
                            </div>
                            <div class="dates col-sm-6 row my-auto">
                                <div class="col-sm-6">
                                    <label>Start</label>
                                    <input id="start_date" type="date" placeholder="dd-mm-yyyy">
                                </div>
                                <div class="col-sm-6">
                                    <label>End</label>
                                    <input id="end_date" type="date" placeholder="dd-mm-yyyy">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-5 container-fluid">
    @for($i = 0; $i < count($questions); $i++)
    <div id="questions-list" class="wrapper home_question container-fluid" data-id="{{$questions[$i]->id}}">
        <div class="row">
            <div id="prof_info" class="col-3 text-center">
                <img src="{{asset('/img/unknown.png')}}">
                <p><a class="row-2 d-none d-sm-block" href="/pages/profile.php">{{$users[$questions[$i]->id]->username}}</a></p>
            </div>
            <div class="col-9">
                <h1><a id="question-header" href="{{ asset('question/'.$questions[$i]->id) }}">{{$questions[$i]->title }}</a></h1>
            </div>
        </div>

        <div class="row">
            <div class="icons col-9">

                @if($questionsVotes[($questions[$i])->id] != null)

                    @if($questionsVotes[($questions[$i])->id]->vote == 1)
                        <a class="icon" >
                            <i class="fas fa-thumbs-up fa-lg" id="like3P"> {{ $questions[$i]->nr_likes }}</i>
                        </a>
                        <a class="icon" >
                            <i class="fas fa-thumbs-down fa-lg" id ="dislike3"> {{ $questions[$i]->nr_dislikes }}</i>
                        </a>
                    @else
                        <a class="icon" >
                            <i class="fas fa-thumbs-up fa-lg" id="like3"> {{ $questions[$i]->nr_likes }}</i>
                        </a>
                        <a class="icon" >
                            <i class="fas fa-thumbs-down fa-lg" id ="dislike3P"> {{ $questions[$i]->nr_dislikes }}</i>
                        </a>
                    @endif

                @else
                    <a class="icon" >
                        <i class="fas fa-thumbs-up fa-lg" id="like3"> {{ $questions[$i]->nr_likes }}</i>
                    </a>
                    <a class="icon" >
                        <i class="fas fa-thumbs-down fa-lg" id ="dislike3"> {{ $questions[$i]->nr_dislikes }}</i>
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
                        <i class="fas fa-arrow-right fa-lg" id="unfollowH"> unfollow </i>
                    @else
                        <i class="fas fa-arrow-right fa-lg" id="followH"> follow </i>
                    @endif
                </a>
                @endif
            </div>
            <p class="col-3" id=question_date>{{ $questions[$i]->question_date }}</p>
        </div>
    </div>
    @endfor
</div>