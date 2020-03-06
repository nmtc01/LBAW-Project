<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/list_format.css">
    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <header>
        <div class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light navbar-default">
                <div class="container">
                    <a href="#" class="navbar-brand">Answerly</a>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <div class="filters">
                <form>
                    <label>Filter:</label>
                    <div id="filters-bar">
                        <div class="checkboxes">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Answered</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">+Positive Score</label>
                            </div>
                        </div>
                        <div class="dates">
                            <div>
                                <label>Start</label>
                                <input type="date" value="dd-mm-yyyy">
                            </div>
                            <div>
                                <label>End</label>
                                <input type="date" value="dd-mm-yyyy">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <div class="media">
            <div class="media-body">
                <h1 class="mt-0">Search Results</h1>
                <ul class="list-unstyled">
                    <li class="media mt-3">
                        <a class="pr-3" href="#">
                            <img src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body">
                            <h2 class="mt-0">Adam Sandler's cool experiment</h2>
                            <p>Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing research for my next movie and I want it to be 100% cientifically correct... </p>
                        </div>
                    </li>
                    <li class="media mt-3">
                        <a class="pr-3" href="#">
                            <img src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body">
                            <h2 class="mt-0">Adam Sandler's cool experiment</h2>
                            <p>Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing research for my next movie and I want it to be 100% cientifically correct... </p>
                        </div>
                    </li>
                </ul>
            </div>   
        </div>
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

    <footer class="page-footer font-small indigo">
        <!-- Footer Links -->
        <div class="container text-center text-md-left">
        <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 mx-auto">
                    <!-- Links -->
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Labels</h3>
                    <ul class="list-unstyled">
                        <li>
                        <a href="#!">Access my profile</a>
                        </li>
                        <li>
                        <a href="#!">Add a question</a>
                        </li>
                        <li>
                        <a href="#!">Get back home</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3 mx-auto">
                <!-- Links -->
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Labels</h3>
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
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Labels</h3>
                    <ul class="list-unstyled">
                        <li>
                        <a href="#!">Physics</a>
                        </li>
                        <li>
                        <a href="#!">Anatomy</a>
                        </li>
                        <li>
                        <a href="#!">Comics</a>
                        </li>
                    </ul>
                </div>
                    <!-- Grid column -->
                    <div class="col-md-3 mx-auto">
                    <!-- Links -->
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">About</h3>
                    <ul class="list-unstyled">
                        <li>
                        <a href="#!">About us</a>
                        </li>
                        <li>
                        <a href="#!">Contacts</a>
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
        <a href="index.php"> Answerly</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>