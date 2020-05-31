<div class="container profile">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#notifications" data-toggle="tab" class="nav-link">Notifications</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#my-questions" data-toggle="tab" class="nav-link">My Questions</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
            </ul>
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
                            <!--
                            <p>
                                Birthdate: 25/04/1974
                            </p>
                        -->
                        </div>
                        <div class="col-md-6">
                            <h6>Recent labels</h6>
                            <a href="#" class="badge badge-dark badge-pill">cana de pesca</a>
                            <a href="#" class="badge badge-dark badge-pill">anzol</a>
                            <a href="#" class="badge badge-dark badge-pill">isco</a>
                            <a href="#" class="badge badge-dark badge-pill">barco</a>
                            <a href="#" class="badge badge-dark badge-pill">rabanada de vento</a>
                            <a href="#" class="badge badge-dark badge-pill">mastro</a>
                            <a href="#" class="badge badge-dark badge-pill">rede</a>
                            <a href="#" class="badge badge-dark badge-pill">pesca</a>
                            <hr>
                            <span class="badge badge-success"><i class="fas fa-star"></i> Score {{$userInfo->score}}</span>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="notifications">
                    <table class="table table-hover table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <span class="float-right font-weight-bold">3 hrs ago</span> You were reported by SociedadeAntiPesca.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="float-right font-weight-bold">Yesterday</span> Your account is being verified for suspected behavior.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="float-right font-weight-bold">9/10</span> New features on the website soon, stay tuned!
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="float-right font-weight-bold">9/6</span> You have been a very active user!
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="float-right font-weight-bold">9/4</span> Welcome to our website!!!
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                            <a id="previous" class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a id="next" class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
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
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>How do I put the hook on the line?</td>
                                        <td>8</td>
                                        <td>300</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Is it a good time to go fishing?</td>
                                        <td>17</td>
                                        <td>146</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Is it sardine season?</td>
                                        <td>3</td>
                                        <td>421</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>In what order should I watch all the mcu?</td>
                                        <td>7</td>
                                        <td>67</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Is it possible for Leicester City to defeat Aston Villa in the English Premier League?</td>
                                        <td>2</td>
                                        <td>41</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                <a id="previous" class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a id="next" class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="tab-pane" id="edit">
                    <form role="form">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{$userInfo->first_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{$userInfo->last_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="{{$userInfo->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Description</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{$userInfo->bio}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{$userInfo->username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="button" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6 class="mt-2">Upload a different photo</h6>
            <div class="file btn btn-link">
                Choose file
                <input type="file" name="file" />
            </div>
        </div>
    </div>
</div>