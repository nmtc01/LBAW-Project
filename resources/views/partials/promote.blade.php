<div class="tab-pane" id="promote">

    <div class="wrapper-2">
        
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Users
            </button>
            @foreach ($best_users as $best_user)
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_elem4{{ $best_user->id }}">
                {{ $best_user->username }}
            </button>
            <div class="modal fade" id="reported_elem4{{ $best_user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Best scored users</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>{{ $best_user->username }}</h1>
                            <p>This user has a score of {{ $best_user->score }}</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ asset('/user/'.$best_user->id) }}" role="button" class="btn btn-primary view">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Moderators
            </button>
            @foreach ($best_moderators as $best_moderator)
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_elem5{{ $best_moderator->id }}">
                {{ $best_moderator->username }}
            </button>
            <div class="modal fade" id="reported_elem5{{ $best_moderator->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Best scored moderators</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>{{ $best_moderator->username }}</h1>
                            <p>This moderator has a score of {{ $best_moderator->score }}</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ asset('/user/'.$best_moderator->id) }}" role="button" class="btn btn-primary view">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
       
    </div>

</div>