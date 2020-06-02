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
            <div class="modal fade" id="reported_question{{ $reportedQuestion->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-id={{ $reportedQuestion->id }}>
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
                                <a href="{{ asset('/user/'.$owners[$reportedQuestion->id]->id) }}">{{ $owners[$reportedQuestion->id]->username }}</a>
                                <p>{{ $reportedQuestion->description }}</p>
                            </div>
                            @foreach ($questionsReports[$reportedQuestion->id] as $report)
                            <div class="modal-report reportForQuestion{{$reportedQuestion->id}}" data-id={{ $report->id }}>
                                <p class="report_content"><span>{{ $reporters[$report->id]->username }}</span> - "{{ $report->description }}"</p>
                                <p class="report_date">{{ $report->report_date }}</p> 
                            </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#resolveReportedQuestion{{ $reportedQuestion->id }}" aria-expanded="false">
                                Resolve
                            </button>
                            <a href="{{ action('QuestionController@open', ['id' => $reportedQuestion->id]) }}" role="button" class="btn btn-primary view">
                                View
                            </a>
                        </div>
                        <div class="collapse" id="resolveReportedQuestion{{ $reportedQuestion->id }}">
                            <div class="card card-body">
                                <textarea class="form-control" placeholder="Write here a brief commentary explaining your contribution handling this report. Then press Send." name="report_resolve" rows="5"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" type="button" class="btn btn-primary send resolve-btn">
                                    Send
                                </button>
                            </div>
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
            @foreach($reportedAnswers as $reportedAnswer)
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_answer{{ $reportedAnswer->id }}">
                {{ $reportedAnswer->content }}
            </button>
            <div class="modal fade" id="reported_answer{{ $reportedAnswer->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-id={{ $reportedAnswer->id }}>
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reported Answer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>{{ $reportedAnswer->content }}</h1>
                            <p><a href="{{ asset('/user/'.$answer_owners[$reportedAnswer->id]->id) }}">{{$answer_owners[$reportedAnswer->id]->username}}</a></p>
                            @foreach ($answerReports[$reportedAnswer->id] as $report)
                            <div class="modal-report reportForAnswer{{$reportedAnswer->id}}" data-id={{ $report->id }}>
                                <p class="report_content"><span>{{ $answer_reporters[$report->id]->username }}</span> - "{{ $report->description }}"</p>
                                <p class="report_date">{{ $report->report_date }}</p> 
                            </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#resolveReportedAnswer{{ $reportedAnswer->id }}" aria-expanded="false">
                                Resolve
                            </button>
                            <a href="{{ action('QuestionController@open', ['id' => $reportedAnswer->question_id]) }}" role="button" class="btn btn-primary view">
                                View
                            </a>
                        </div>
                        <div class="collapse" id="resolveReportedAnswer{{ $reportedAnswer->id }}">
                            <div class="card card-body">
                                <textarea class="form-control" placeholder="Write here a brief commentary explaining your contribution handling this report. Then press Send." name="report_resolve" rows="5"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary send resolve-btn">
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Comments
            </button>
            @foreach($reportedComments as $reportedComment)
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_comment{{ $reportedComment->id }}">
                {{ $reportedComment->content }}
            </button>
            <div class="modal fade" id="reported_comment{{ $reportedComment->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-id={{ $reportedComment->id }}>
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reported Comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>{{ $reportedComment->content }}</h1>
                            <p><a href="{{ asset('/user/'.$comment_owners[$reportedComment->id]->id) }}">{{$comment_owners[$reportedComment->id]->username}}</a></p>
                            @foreach ($commentReports[$reportedComment->id] as $report)
                            <div class="modal-report reportForComment{{$reportedComment->id}}" data-id={{ $report->id }}>
                                <p class="report_content"><span>{{ $comment_reporters[$report->id]->username }}</span> - "{{ $report->description }}"</p>
                                <p class="report_date">{{ $report->report_date }}</p> 
                            </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#resolveReportedComment{{ $reportedComment->id }}" aria-expanded="false">
                                Resolve
                            </button>
                            @if ($reportedComment->question_id != null)
                            <a href="{{ action('QuestionController@open', ['id' => $reportedComment->question_id]) }}" role="button" class="btn btn-primary view">
                                View
                            </a>
                            @else
                            <a href="{{ action('QuestionController@open', ['id' => $reportedComment->answer_id]) }}" role="button" class="btn btn-primary view">
                                View
                            </a>
                            @endif
                        </div>
                        <div class="collapse" id="resolveReportedComment{{ $reportedComment->id }}">
                            <div class="card card-body">
                                <textarea class="form-control" placeholder="Write here a brief commentary explaining your contribution handling this report. Then press Send." name="report_resolve" rows="5"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary send resolve-btn">
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>