<div class="tab-pane active" id="reports">
    <div class="wrapper-2">
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Questions
            </button>
            @foreach ($reportedQuestions as $reportedQuestion)
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_question{{ $reportedQuestion->id }}">
                {{ $reportedQuestion->title }}
            </button>
            <div class="modal fade" id="reported_question{{ $reportedQuestion->id }}" tabindex="-1" role="dialog" aria-labelledby="reported_title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reported Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <h2>{{ $reportedQuestion->title }}</h2>
                                <a href="{{--TODO--}}">{{ $owners[$reportedQuestion->id]->username }}</a>
                                <p>{{ $reportedQuestion->description }}</p>
                            </div>
                                @foreach ($questionsReports[$reportedQuestion->id] as $report)
                                <div id="modal-report">
                                    <p id=report_content><span>{{ $reporters[$report->id]->username }}</span> - "{{ $report->description }}"</p>
                                    <p id=report_date>{{ $report->report_date }}</p> 
                                </div>
                                @endforeach
                        </div>
                        <div class="modal-footer">
                            <a href="{{ action('QuestionController@open', ['id' => $reportedQuestion->id]) }}">
                                <button type="button" class="btn btn-primary">
                                    View
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Answers
            </button>
            {{-- for cycle here --}}
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_elem1{{--TODO id--}}">
                In this example, the variable x is an int and Java will initialize it to 0 for you.
            </button>
            <div class="modal fade" id="reported_elem1{{--TODO id--}}" tabindex="-1" role="dialog" aria-labelledby="reported_title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reported Answer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>In this example, the variable x is an int and Java will initialize it to 0 for you.</h1>
                            <p><a href="{{--TODO--}}">nmtc01</a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Comments
            </button>
            {{-- for cycle here --}}
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_elem2{{--TODO id--}}">
                Please include the name of the object variable in the exception message.
            </button>
            <div class="modal fade" id="reported_elem2{{--TODO id--}}" tabindex="-1" role="dialog" aria-labelledby="reported_title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reported Comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>Please include the name of the object variable in the exception message.</h1>
                            <p><a href="{{--TODO--}}">nmtc01</a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>