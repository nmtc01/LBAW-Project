@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/question.css') }}">
@endsection

@section('side_navs')
  @include('partials.side_navs')
@endsection

@section('content')
<div class="modal fade" id="report_something" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Help us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="formControlTextareaQuestion">Write here a brief description of the problem</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="report_question" type="submit" class="btn btn-primary" data-dismiss="modal">Send</button>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="help_question" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Help</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <h3>What does this page mean?</h3>
                    <p>This page represents a question. It consists of a title and a brief description. You can tell if it was a helpful question or not using the like and dislike buttons. You can also follow it to be notified everytime it's answered. Below, you have its comments and answers. You can also rank and comment answers.</p>
                </div>
                <div>
                    <h3>What happens when I report a question, comment or answer?</h3>
                    <p>If you believe a given post is disrespectful, absurd or even racist you can report it to our Moderators and Admins. You will be asked to write a brief description of the problem to make their jobs more efficient. Reporting this type of behaviour helps us enhance your user experience and create a more thriving community.</p>
                </div>
                <div>
                    <h3>Some answers have a green tick on their wildcard. What does that mean?</h3>
                    <p>If you see a green tick on an answer, that means it is considered by the question holder as a valid response. That is, the user who asked believes its question has been successfully answered.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button id="close_help_question" class="btn btn-primary" data-dismiss="modal">Ok, thank you</button>
            </div>
        </div>
    </div>
</div> 

<div id="question-div" class="container-fluid col-md-6" data-id = "{{$question->id}}">
    <div class="wrapper">
        @include('partials.question')
        <div>
            <div class="form-group" id="add_answer_form">
                <label for="exampleFormControlTextarea1"></label>
                <form class="new_answer">
                    <textarea class="form-control" placeholder="Do you know the answer to this question?"id="exampleFormControlTextarea1" rows="4"></textarea>
                </form>
                <button class="btn my-2 my-sm-0" type="submit"> Answer </button>
            </div>

            <div class="form-group add_comment_form">
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