<div class="col-md-5 container-fluid">
    <a @if(!Auth::check()) href="{{ asset('login') }}" @endif>
        <button id="add_btn" class="input-button" @if(Auth::check())data-toggle="modal" data-target="#ask_something"@endif>
            What is your question?
        </button>
    </a>
    @foreach($questions as $question)
    <div id="questions-list" class="wrapper home_question container-fluid">
        <div class="row">
            <div id="prof_info" class="col-3 text-center">
                <img src="{{asset('/img/unknown.png')}}">
                <p><a class="row-2 d-none d-sm-block" href="/pages/profile.php">{{$users[$question->id]->username}}</a></p>
            </div>
            <div class="col-9">
                <h1><a id="question-header" href="{{ asset('question/'.$question->id) }}">{{ $question->title }}</a></h1>
            </div>
        </div>

        <div class="row">
            <div class="icons col-9">
                <a class="icon" href="#">
                    <i class="fas fa-thumbs-up fa-lg"> {{ $question->nr_likes }}</i>
                </a>
                <a class="icon" href="#">
                    <i class="fas fa-thumbs-down fa-lg"> {{ $question->nr_dislikes }}</i>
                </a>
                <a class="icon" href="#">
                    <i class="fas fa-reply fa-lg"> {{ isset($nr_answers[$question->id]) ?  $nr_answers[$question->id] : 0}} </i>
                </a>

                @if (Auth::check())
                <a class="icon">
                    <i class="fas fa-arrow-right fa-lg" id="follow1"> follow</i>
                </a>
                @endif
            </div>
            <p class="col-3" id=question_date>{{ $question->question_date }}</p>
        </div>
    </div>
    @endforeach
</div>