<div class="tab-pane" id="reported-users">

    <div class="wrapper-2">
        
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Username
            </button>
            {{-- for cycle here --}}
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_elem3{{--TODO id--}}">
                pedrodantas
            </button>
            <div class="modal fade" id="reported_elem3{{--TODO id--}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reported Element</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>pedrodantas</h1>
                            <p><a href="{{--TODO--}}">This user was the origin of 10 reported elements</a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">
                                Ban
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

</div>