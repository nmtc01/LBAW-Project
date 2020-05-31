<div class="tab-pane" id="reported-users">

    <div class="wrapper-2">
        
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Username
            </button>
            @foreach ($reportedUsers as $reportedUser)
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_user{{ $reportedUser->id }}">
                {{ $reportedUser->username }}
            </button>
            <div class="modal fade" id="reported_user{{ $reportedUser->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-id={{ $reportedUser->id }}>
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reported User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>{{ $reportedUser->username }}</h1>
                            @foreach ($userReports[$reportedUser->id] as $report)
                            <div class="modal-report reportForUser{{$reportedUser->id}}" data-id={{ $report->id }}>
                                <p class="report_content"><span>{{ $user_reporters[$report->id]->username }}</span> - "{{ $report->description }}"</p>
                                <p class="report_date">{{ $report->report_date }}</p> 
                            </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#resolveReportedUser{{ $reportedUser->id }}" aria-expanded="false">
                                Resolve
                            </button>
                            <a href="{{ asset('/user/'.$reportedUser->id) }}" role="button" class="btn btn-primary view">
                                View
                            </a>
                        </div>
                        <div class="collapse" id="resolveReportedUser{{ $reportedUser->id }}">
                            <div class="card card-body">
                                <textarea class="form-control" placeholder="Write here a brief commentary explaining your contribution handling this report. Then press Send." name="report_resolve" rows="5"></textarea>
                            </div>
                            <div class="modal-footer" data-dismiss="modal">
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