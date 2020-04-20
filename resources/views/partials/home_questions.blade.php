<div class="col-md-5 container-fluid">
    <button id="add_btn" class="input-button" data-toggle="modal" data-target="#ask_something">
        What is your question?
    </button>

    @foreach($questions as $question)

        <div class="wrapper home_question container-fluid">

            <div class="row">
                <div id="prof_info" class="col-2 text-center">
                    <img src="{{asset('/img/unknown.png')}}">
                    <p><a class="row-2 d-none d-sm-block" href="/pages/profile.php">{{$users[$question->id]->username}}</a></p>
                </div>
                <div class="col-10">
                    <h1><a id="question-header" href="/pages/question.php">{{ $question->title }}</a></h1>
                </div>
            </div>

            <div class="icons">
                <a class="icon" href="#">
                <i class="fas fa-thumbs-up fa-lg"> {{ $question->nr_likes }}</i>
                </a>
                <a class="icon" href="#">
                    <i class="fas fa-thumbs-down fa-lg"> {{ $question->nr_dislikes }}</i>
                </a>
                <a class="icon" href="#">
                    <i class="fas fa-reply fa-lg"> 10 </i>
                </a>

            @if (Auth::check())
            <a class="icon" href="#">
                <i class="fas fa-arrow-right fa-lg"> follow</i>
            </a>
            @endif
            
            </div>
        </div>

    @endforeach

</div>