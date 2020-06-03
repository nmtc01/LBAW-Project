<div class="modal fade" id="manage_users" tabindex="-1" role="dialog" aria-hidden="true" data-id="{{ $userInfo->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change user status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (Auth::user()->id == $userInfo->id)
                <p>This process is irreversible. Are you sure you want to delete your account?</p>
                <button class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button id="delete-account-btn" type="submit" class="btn btn-primary" data-dismiss="modal">Yes</button>

                @elseif ($userInfo->getUserCurrentRole() == 'user')
                <p>This user is a normal authenticated user</p> 
                <button id="promote-btn" type="submit" class="btn btn-primary" data-dismiss="modal">Promote</button>
                <button id="ban-btn" type="submit" class="btn btn-primary" data-dismiss="modal">Ban</button>

                @elseif ($userInfo->getUserCurrentRole() == 'moderator')
                <p>This user is a moderator</p>
                <button id="promote-btn" type="submit" class="btn btn-primary" data-dismiss="modal">Promote</button>
                <button id="demote-btn" type="submit" class="btn btn-primary" data-dismiss="modal">Demote</button>

                @elseif ($userInfo->getUserCurrentRole() == 'administrator') 
                <p>This user is an administrator</p>
                <button id="demote-btn" type="submit" class="btn btn-primary" data-dismiss="modal">Demote</button>

                @elseif ($userInfo->getUserCurrentRole() == 'banned') 
                <p>This user was banned</p>

                @else
                <p>This user deleted the account</p>

                @endif
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
<div class="container profile">
    <div class="row my-2">
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="{{asset('/img/' . $userInfo->photo_path)}}"  width ="250rem" height="250rem" class="mx-auto img-fluid img-circle d-block" alt="user image">
            @if(Auth::user()->id == $userInfo->id)
            <h6 class="mt-2">Upload a different photo</h6>
            {{--<form method="POST" action="{{ action('UserController@uploadImage') }}">--}}
                <div class="file btn btn-link">
                    Choose file
                    <input type="file" name="file" />
                </div>
                <button type="submit">Submit</button>
            {{--</form>--}}
            @endif
        </div>
        <div class="col-lg-8 order-lg-2">
            <div class="row">
                <ul class="nav nav-tabs col-9">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>
                    @if(Auth::user()->id == $userInfo->id)
                    <li class="nav-item">
                        <a href="" data-target="#notifications" data-toggle="tab" class="nav-link">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#my-questions" data-toggle="tab" class="nav-link">My Questions</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="" data-target="#my-questions" data-toggle="tab" class="nav-link">Recent Questions</a>
                    </li>
                    @endif
                </ul>
                @if(Auth::user()->getUserCurrentRole() == 'administrator' && Auth::user()->id != $userInfo->id)
                <button class="btn my-2 my-sm-0" data-toggle="modal" data-target="#manage_users">Moderate</button>
                @elseif (Auth::user()->id == $userInfo->id)
                <button class="btn my-2 my-sm-0" data-toggle="modal" data-target="#manage_users">Delete account</button>
                @endif
                
            </div>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">{{$userInfo->first_name}} {{$userInfo->last_name}}</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                Username: {{$userInfo->username}}
                            </p>
                            <p>
                                Email: {{$userInfo->email}}
                            </p>
                            <p>
                                Description: {{$userInfo->bio}}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <span class="badge badge-success ml-auto"><i class="fas fa-star"></i> Score {{$userInfo->score}}</span>
                            <a class="icon-profile">
                                <i class="fas fa-question-circle mr-5" data-toggle="modal" data-target="#help_profile"> Help</i>
                            </a>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                @if(Auth::user()->id == $userInfo->id)
                <div class="tab-pane" id="notifications">
                    <table class="table table-hover table-striped">
                        <tbody>
                            @foreach(Auth::user()->listNotifications(); as $notification)
                            <tr>
                                <td>
                                <span class="float-right font-weight-bold">{{$notification->date}}</span> <a class="question-header-profile" href="{{ asset('/question/'.$notification->question_id) }}">{{$notification->content}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="my-questions">
                    <div class="col-md-12">
                        <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>Recent Activity</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Answers</th>
                                        <th scope="col">Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($userQuestions as $question)
                                    <tr>
                                    <th scope="row">{{$i}}</th>
                                        <td>
                                        <span class="float-right font-weight-bold"></span> <a class="question-header-profile" href="{{ asset('/question/'.$question->id) }}">{{$question->title}}</a>
                                        </td>
                                        <td>{{ $nr_answers[$question->id] }}</td>
                                        <td>{{$question->nr_likes - $question->nr_dislikes}}</td>
                                    </tr>
                                    <?php $i = $i + 1; ?>
                                @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="edit">
                    <form>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="first_name" type="text" value="{{$userInfo->first_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="last_name" type="text" value="{{$userInfo->last_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="email" type="email" value="{{$userInfo->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Description</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="bio" type="text" value="{{$userInfo->bio}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="username" type="text" value="{{$userInfo->username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="password" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="confirmPassword" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="button" class="btn btn-primary" id="editProfile" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
                @else
                <div class="tab-pane" id="my-questions">
                    <div class="col-md-12">
                        <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>Recent Activity</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Answers</th>
                                        <th scope="col">Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($userQuestions as $question)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>
                                        <span class="float-right font-weight-bold"></span> <a class="question-header-profile" href="{{ asset('/question/'.$question->id) }}">{{$question->title}}</a>
                                        </td>
                                        <td>{{ $nr_answers[$question->id] }}</td>
                                        <td>{{$question->nr_likes - $question->nr_dislikes}}</td>
                                    </tr>
                                 <?php $i = $i + 1; ?>
                                @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>