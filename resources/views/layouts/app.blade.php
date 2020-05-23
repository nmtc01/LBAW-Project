<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    
        {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}

        <!-- Styles -->
        {{--  <link href="{{ asset('css/milligram.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

        <title>Answerly</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/6d90d25abc.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous">

        <script type="text/javascript">
            // Fix for Firefox autofocus CSS bug
            // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
        </script>
        <script type="text/javascript" src={{ asset('js/app.js') }} defer> 
        </script>

        <!-- our css -->
        @section('css_script')
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
        @show
    </head>
    <body>
        <main>
        <header>
            
            <nav class="navbar navbar-expand-lg navbar-light navbar-default fixed-top">
                <div id="answerly" class="navbar-brand col-3">
                    <a href="{{ asset('/') }}">Answerly</a>
                </div>
                <div id="search-bar" class="collapse navbar-collapse navbarSupportedContent m-auto">
                    <form class="form-inline navbar-nav m-auto">
                        <input id="start_search" class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
                <div id="sign-in" class="collapse navbar-collapse navbarSupportedContent col-sm-3">
                    <ul class="navbar-nav">
                        @if (!Auth::check())
                        <li class="nav-item">
                            <a class="btn btn-primary my-2 my-sm-0" href="{{ url('/login') }}" role="button">Sign in</a>
                        </li>
                        @else
                        <li>
                            <li class="nav-item">
                                <button class="btn my-2 my-sm-0" data-toggle="modal" data-target="#ask_something" type="submit">Ask Something</button>
                            </li>
                            <li class="nav-link ml-2">
                                <div class="dropdown">
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuProfileButton">
                                        <a class="dropdown-item" href="../pages/profile.php">Profile</a>
                                        <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a><span>{{ Auth::user()->name }}</span>
                                    </div>
                                </div>
                                <a class="fas fa-user fa-lg dropdown-toggle" id="dropdownMenuProfileButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            </li>
                            <li class="nav-link">
                                <div class="dropdown">
                                    <div id="notifications_menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuNotificationsButton">
                                    <?php
                                    /*$img = array("bob_iger.jpeg","robert-jr.jpg");
                                    $user = array("pedro_dantas","cr7fan");
                                    $question = array("Will Erling Braut Haaland be a future winner of the Ballon d’Or?","How can I learn C and C++?");
                                    for($i = 0; $i < 2; $i++) {
                                        draw_notification($img[0], $user[0], $question[0]);
                                        draw_notification($img[1], $user[1], $question[1]);
                                    }*/
                                    ?>
                                    </div>
                                </div>
                                <a class="fas fa-bell fa-lg dropdown-toggle" id="dropdownMenuNotificationsButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                </a>
                            </li>
                        </li>
                        @endif
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <div class="modal fade" id="ask_something" tabindex="-1" role="dialog" aria-labelledby="ask_something_title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ask something</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Write your question here</label>
                                    <textarea class="form-control" id="formControlTextareaQuestion" rows="1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Write more details here</label>
                                    <textarea class="form-control" id="formControlTextareaDescription" rows="3"></textarea>
                                </div>
                                <div id="labels">
                                    <a class="badge badge-dark badge-pill" id="add_label">+</a>
                                </div>
                                <div id="form-buttons" class="form-group row">
                                    <input type="file" class="form-control-file col-sm-9" id="exampleFormControlFile1" accept="image/png, image/jpeg">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="add_question_btn" type="submit" class="btn btn-primary" data-dismiss="modal">Add</button>
                        </div>
                    </div>
                </div>
            </div> 

        </header>
        <section id="side_navs">
            @yield('side_navs')
        </section>

        <section id="content">
            @yield('content')
        </section>
    </main>
    <footer class="page-footer font-small indigo">
        <!-- Footer Links -->
        <div class="container text-center text-md-left">
        <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 mx-auto">
                    <!-- Links -->
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Access</h3>
                    <ul class="list-unstyled">
                        @if (Auth::check())
                        <li>
                        <a href="../pages/profile.php">Access my profile</a>
                        </li>
                        <li>
                        <a href="{{ asset('/admin') }}">Moderate</a>
                        </li>
                        @endif
                        <li>
                        <a href="{{ asset('/') }}">Get back home</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3 mx-auto">
                <!-- Links -->
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Most Popular</h3>
                    <ul class="list-unstyled">
                        <li>
                        <a href="#!">#Sports</a>
                        </li>
                        <li>
                        <a href="#!">#Astronomy</a>
                        </li>
                        <li>
                        <a href="#!">#Web_development</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3 mx-auto">
                    <!-- Links -->
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Most Popular</h3>
                    <ul class="list-unstyled">
                        <li>
                        <a href="#!">#Physics</a>
                        </li>
                        <li>
                        <a href="#!">#Anatomy</a>
                        </li>
                        <li>
                        <a href="#!">#Comics</a>
                        </li>
                    </ul>
                </div>
                    <!-- Grid column -->
                    <div class="col-md-3 mx-auto">
                    <!-- Links -->
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">About</h3>
                    <ul class="list-unstyled">
                        <li>
                        <a href="{{ asset('about') }}">About us</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
            </div>
        <!-- Grid row -->
        </div>
        <!-- Footer Links -->
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="{{ asset('/') }}"> Answerly</a>
        </div>
        <!-- Copyright -->
    </footer>
  </body>
</html>
