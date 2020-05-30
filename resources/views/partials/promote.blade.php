<div class="tab-pane" id="promote">

    <div class="wrapper-2">
        
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Users
            </button>
            {{-- for cycle here --}}
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_elem4{{--TODO id--}}">
                bob56moura
            </button>
            <div class="modal fade" id="reported_elem4{{--TODO id--}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reported Element</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>bob56moura</h1>
                            <p><a href="{{--TODO--}}">This user has a score of 10</a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">
                                Change Status
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Moderators
            </button>
            {{-- for cycle here --}}
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_elem5{{--TODO id--}}">
                nmtc01
            </button>
            <div class="modal fade" id="reported_elem5{{--TODO id--}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reported Element</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>nmtc01</h1>
                            <p><a href="{{--TODO--}}">This user has a score of 10</a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">
                                Change Status
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

</div>