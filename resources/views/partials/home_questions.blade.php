<div class="col-md-5 container-fluid">
    <a @if(!Auth::check()) href="{{ asset('login') }}" @endif>
        <button id="add_btn" class="input-button" @if(Auth::check())data-toggle="modal" data-target="#ask_something"@endif>
            What is your question?
        </button>
    </a>
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
                <a class="icon" href="#">
                    <i class="fas fa-thumbs-up fa-lg"> {{ $questions[$i]->nr_likes }}</i>
                </a>
                <a class="icon" href="#">
                    <i class="fas fa-thumbs-down fa-lg"> {{ $questions[$i]->nr_dislikes }}</i>
                </a>
                <a class="icon" href="#">
                    <i class="fas fa-reply fa-lg"> {{ isset($nr_answers[$questions[$i]->id]) ?  $nr_answers[$questions[$i]->id] : 0}} </i>
                </a>

                @if (Auth::check())
                <a class="icon">
                    @php
                    $flag = false;
                    @endphp
                    @for ($j = 0; $j < count($questions_followed); $j++)
                        @if($questions_followed[$j]->id == $questions[$i]->id)
                            @php
                            $flag = true;
                            @endphp
                        @endif
                    @endfor
                    @if($flag)
                        <i class="fas fa-arrow-right fa-lg" id="unfollow1"> unfollow </i>
                    @else
                        <i class="fas fa-arrow-right fa-lg" id="follow1"> follow </i>
                    @endif
                </a>
                @endif
            </div>
            <p class="col-3" id=question_date>{{ $questions[$i]->question_date }}</p>
        </div>
    </div>
    @endfor
</div>