@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/question.css') }}">
@endsection

@section('side_navs')
  @include('partials.side_navs')
@endsection

@section('content')
<div id="question-div" class="container-fluid" data-id = "{{$question->id}}">
    <div class="wrapper col-md-5">
        @include('partials.question')
        <div>
            <div class="form-group" id="add_answer_form">
                <label for="exampleFormControlTextarea1"></label>
                <form class="new_answer">
                    <textarea name="password" class="form-control" placeholder="Do you know the answer to this question?"id="exampleFormControlTextarea1" rows="4"></textarea>
                </form>
                @if ($errors->has('password'))
                    <span class="error">
                        {{ $errors->first('password') }}
                    </span>
                @endif
                <button class="btn my-2 my-sm-0" type="submit"> Answer </button>
            </div>

            <div class="form-group" id="add_comment_form">
                <label for="exampleFormControlTextarea2"></label>
                <textarea class="form-control" placeholder="Do you want to comment this question?"id="exampleFormControlTextarea2" rows="2"></textarea>
                <button class="btn my-2 my-sm-0" id="comment-button" type="submit">Comment</button>
            </div>
            <div class="container">
                @include('partials.comments')
            </div>              
            @include('partials.answers')
        </div>
    </div>
</div>
@endsection