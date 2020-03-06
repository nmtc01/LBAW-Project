<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6d90d25abc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/question.css">
    <link rel="stylesheet" href="../css/list_format.css">
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
                <a href="../pages/home.php" class="navbar-brand">Answerly</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <button class="btn my-2 my-sm-0" type="submit">Ask Something</button>
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

    <div class="wrapper">

        <div class="media">
            <img class="mr-3" src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
            <div class="media-body">
                <h1 class="mt-0">Question heading</h1>
                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>

                <div class=icons>
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

                <div class="form-group">
                    <label for="exampleFormControlTextarea1"></label>
                    <textarea class="form-control" placeholder="Do you know the answer to this question?"id="exampleFormControlTextarea1" rows="7"></textarea>
                </div>

                <h2 class="mt-0">Comments</h2>

                <div class="media-body">
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                </div>

                <h2 class="mt-0">Answers</h2>
                
                <ul class="list-unstyled">
                    <li class="media mt-3">

                        <a class="pr-3" href="#">
                            <img src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body">

                            <h3 class="mt-0">Answer heading</h3>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                            <div class=icons-answers>
                                <a class="icon-answers" href="#">
                                    <i class="fas fa-thumbs-up"> 35</i>
                                </a>
                                <a class="icon-answers" href="#">
                                    <i class="fas fa-thumbs-down"> 4</i>
                                </a>
                            </div>
                        </div>

                    </li>

                    <li class="media mt-3">

                        <a class="pr-3" href="#">
                            <img src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body">

                            <h3 class="mt-0">Answer heading</h3>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                            <div class=icons-answers>
                                <a class="icon-answers" href="#">
                                    <i class="fas fa-thumbs-up"> 35</i>
                                </a>
                                <a class="icon-answers" href="#">
                                    <i class="fas fa-thumbs-down"> 4</i>
                                </a>
                            </div>
                        </div>

                    </li>

                    <li class="media mt-3">

                        <a class="pr-3" href="#">
                            <img src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body">

                            <h3 class="mt-0">Answer heading</h3>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                            <div class=icons-answers>
                                <a class="icon-answers" href="#">
                                    <i class="fas fa-thumbs-up"> 35</i>
                                </a>
                                <a class="icon-answers" href="#">
                                    <i class="fas fa-thumbs-down"> 4</i>
                                </a>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>

    </div>


</body>

</html>