<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6d90d25abc.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/layout.css">

</head>

<body>
    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar-default fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">Answerly</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <button class="btn my-2 my-sm-0" type="submit">Ask
                                Something</button>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li>
                            <a class="nav-link" href="#" >
                                <i class="fas fa-user fa-lg"></i>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#" >
                                <i class="fas fa-bell fa-lg"></i>
                            </a>
                        </li>
                    </ul>



                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit" >Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>



    <button class="input-button">
        What is your question?
    </button>

    </button>

    <? for($i = 0; $i < 10; $i++){ ?>
    <div class="wrapper">
        <div class="media">
            <img src="../resources/bob_iger.jpeg" class="align-self-start mr-3" alt="adam_sandler profile pic" width="64px"
                height="64px">
            <div class="media-body">
                <h5 class="mt-0">This is a question template</h5>
                Lorem ipsum dolor sit amet, nullam posuere urna duis id maecenas feugiat, dictum ante proin praesent at, dolor laoreet arcu, gravida pede gravida hymenaeos. Diam nunc leo tristique sed vel augue, non sem. Velit molestie diam justo turpis molestie justo, justo et. Aenean integer luctus aliquam massa, nunc aliquam varius justo, aliquam non ipsum elit tellus maecenas, consequat consectetuer nascetur sem, vel tellus. Eu purus, viverra sociosqu faucibus cras integer facilisis aenean, libero voluptatem dolor non class vivamus nulla, elit turpis auctor gravida, vel tempor.
            </div>

        </div>

        <br>

        <a class="icon" href="#">
            <i class="fas fa-thumbs-up fa-lg"> 35</i>
        </a>
        <a class="icon" href="#">
            <i class="fas fa-thumbs-down fa-lg"> 4</i>
        </a>
        <a class="icon" href="#">
            <i class="fas fa-reply fa-lg"> 6</i>
        </a>


    </div>
    <? }
    ?>

    <!--
    <div class="wrapper">
        <div class="media">
            <img src="../resources/bob_iger.jpeg" class="align-self-start mr-3" alt="adam_sandler profile pic" width="64px"
                height="64px">
            <div class="media-body">
                <h5 class="mt-0">Adam Sandler's cool experiment</h5>
                Lorem ipsum dolor sit amet, nullam posuere urna duis id maecenas feugiat, dictum ante proin praesent at, dolor laoreet arcu, gravida pede gravida hymenaeos. Diam nunc leo tristique sed vel augue, non sem. Velit molestie diam justo turpis molestie justo, justo et. Aenean integer luctus aliquam massa, nunc aliquam varius justo, aliquam non ipsum elit tellus maecenas, consequat consectetuer nascetur sem, vel tellus. Eu purus, viverra sociosqu faucibus cras integer facilisis aenean, libero voluptatem dolor non class vivamus nulla, elit turpis auctor gravida, vel tempor.
            </div>

        </div>

        <br>

        <a class="icon" href="#">
            <i class="far fa-thumbs-up fa-lg"></i>
        </a>
        <a class="icon" href="#">
            <i class="far fa-thumbs-down fa-lg"></i>
        </a>
        <a class="icon" href="#">
            <i class="fas fa-reply fa-lg"></i>
        </a>
    </div>

    <div class="wrapper">
        <div class="media">
            <img src="../resources/will-ferrel.jpg" class="align-self-start mr-3" alt="adam_sandler profile pic" width="64px"
                height="64px">
            <div class="media-body">
                <h5 class="mt-0">Adam Sandler's cool experiment</h5>
                Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing
                research for my next movie and I wnat it to be 100% cientifically correct...
            </div>

        </div>

        <br>

        <a class="icon" href="#">
            <i class="far fa-thumbs-up fa-lg"></i>
        </a>
        <a class="icon" href="#">
            <i class="far fa-thumbs-down fa-lg"></i>
        </a>
        <a class="icon" href="#">
            <i class="fas fa-reply fa-lg"></i>
        </a>
    </div>

    <div class="wrapper">
        <div class="media">
            <img src="../resources/will-ferrel.jpg" class="align-self-start mr-3" alt="adam_sandler profile pic" width="64px"
                height="64px">
            <div class="media-body">
                <h5 class="mt-0">Adam Sandler's cool experiment</h5>
                Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing
                research for my next movie and I wnat it to be 100% cientifically correct...
            </div>

        </div>

        <br>

        <a class="icon" href="#">
            <i class="far fa-thumbs-up fa-lg"></i>
        </a>
        <a class="icon" href="#">
            <i class="far fa-thumbs-down fa-lg"></i>
        </a>
        <a class="icon" href="#">
            <i class="fas fa-reply fa-lg"></i>
        </a>
    </div>

    <div class="wrapper">
        <div class="media">
            <img src="../resources/will-ferrel.jpg" class="align-self-start mr-3" alt="adam_sandler profile pic" width="64px"
                height="64px">
            <div class="media-body">
                <h5 class="mt-0">Adam Sandler's cool experiment</h5>
                Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing
                research for my next movie and I wnat it to be 100% cientifically correct...
            </div>

        </div>

        <br>

        <a class="icon" href="#">
            <i class="far fa-thumbs-up fa-lg"></i>
        </a>
        <a class="icon" href="#">
            <i class="far fa-thumbs-down fa-lg"></i>
        </a>
        <a class="icon" href="#">
            <i class="fas fa-reply fa-lg"></i>
        </a>
    </div>
    -->


    <div class="sidenav">
        <div class="elements">
            <a href="#about">Sports</a>
            <a href="#services">Movies</a>
            <a href="#clients">TV</a>
            <a href="#contact">Philosophy</a>
            <a href="#contact">Science</a>
        </div>
    </div>

    

</body>

</html>