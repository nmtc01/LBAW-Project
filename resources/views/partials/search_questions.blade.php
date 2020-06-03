<div class="col-md-6 container-fluid">
    @if (count($questions) == 0)
    <div id="question-list-first" class="wrapper home_question container-fluid">
        <p>No results found...</p>
        <p>Please try another search!</p>
    </div>
    @endif
    @for($i = 0; $i < count($questions); $i++)
    <div @if($i == 0) id="question-list-first" @else id="question-list" @endif class="wrapper home_question container-fluid" data-id="{{$questions[$i]->id}}">
        <div class="row mb-3">
            <div class="col-3 text-center">
                <img src="{{asset('/img/unknown.png')}}" alt="user image">
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
            <p class="ml-auto question_date">{{ $questions[$i]->question_date }}</p>
        </div>
    </div>
    @endfor
</div>