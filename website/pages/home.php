<?php
    include_once "../template/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/home.css">

</head>

<body>
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
            <img src="../resources/bob_iger.jpeg" class="align-self-start mr-3" alt="adam_sandler profile pic">
            <div class="media-body">
                <h5 class="mt-0"><a id="question-header" href="question.php">This is a question template</a></h5>
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
    <div class="sidenav">
        <div class="elements">
            <a href="#">Sports</a>
            <a href="#">Movies</a>
            <a href="#">TV</a>
            <a href="#">Philosophy</a>
            <a href="#">Science</a>
        </div>
    </div>

<?php
    draw_footer();
?>