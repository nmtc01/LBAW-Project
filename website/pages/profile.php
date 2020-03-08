<?php
include_once "../templates/tpl_common.php";

draw_main_document();
?>

<link rel="stylesheet" href="../css/index.css">
<link rel="stylesheet" href="../css/profile.css">
</head>

<body>
    <header>
        <?php
        draw_nav_bar("simple");
        ?>
    </header>

    <div class="container profile">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">António Sardinha</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    Username: Tuna
                                </p>
                                <p>
                                    Email: fishforlife@email.com
                                </p>
                                <p>
                                    Description: Fisherman and Poet
                                </p>
                                <p>
                                    Birthdate: 25/04/1974
                                </p>
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
                                <span class="badge badge-success"><i class="fas fa-star"></i> Score 9999</span>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Question</th>
                                                <th scope="col">Number of Answers</th>
                                                <th scope="col">Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Como é que meto o anzol na linha?</td>
                                                <td>8</td>
                                                <td>300</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Está bom tempo para ir pescar?</td>
                                                <td>17</td>
                                                <td>146</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Estamos na época da sardinha?</td>
                                                <td>3</td>
                                                <td>421</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="messages">
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                        </div>
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for tibulum tincidunt ullamcorper eros.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="edit">
                        <form role="form">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="Jane">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="Bishop">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" value="email@gmail.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Website</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="url" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="" placeholder="Street">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" value="" placeholder="City">
                                </div>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" value="" placeholder="State">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                                <div class="col-lg-9">
                                    <select id="user_time_zone" class="form-control" size="0">
                                        <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                        <option value="Alaska">(GMT-09:00) Alaska</option>
                                        <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                        <option value="Arizona">(GMT-07:00) Arizona</option>
                                        <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                        <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                        <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                        <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="janeuser">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
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
</body>

</html>