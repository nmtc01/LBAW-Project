@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/question.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="wrapper col-md-5">
        @include('partials.question')
        <div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" placeholder="Do you know the answer to this question?"id="exampleFormControlTextarea1" rows="4"></textarea>
                <button class="btn my-2 my-sm-0" type="submit">Answer</button>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" placeholder="Do you want to comment this question?"id="exampleFormControlTextarea1" rows="2"></textarea>
                <button class="btn my-2 my-sm-0" type="submit">Comment</button>
            </div>

            @include('partials.comments')              
            @include('partials.answers')
        </div>
    </div>
</div>
@endsection