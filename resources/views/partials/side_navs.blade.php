<div id="sidenav_left" class="sidenav d-none d-md-block">
    @if (Auth::check())
    <label>Recently followed questions</label>
    @foreach($questions_followed as $question_followed)
    <a class="row" data-id="{{$question_followed->id}}" href="{{ asset('question/'.$question_followed->id) }}"> {{ $question_followed->title }}</a>
    @endforeach
    @else
    <label>Popular questions</label>
    @for($i = 0; $i < 6; $i++)
    <a class="row" data-id="{{$popular_questions[$i]->id}}" href="{{ asset('question/'.$popular_questions[$i]->id) }}"> {{$popular_questions[$i]->title }}</a>
    @endfor
    @endif
</div>
<div id="sidenav_right" class="sidenav d-none d-md-block">
    <label>Popular labels</label>
    @foreach($popular_labels as $label)
        <a class="row" href="{{asset('/search?keyword='.$label)}}">#{{$label}}</a>
    @endforeach
</div>