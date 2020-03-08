<?php
function draw_main_document() {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Answerly</title>
        <meta charset="utf-8">
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
        <link rel="stylesheet" href="/css/layout.css">
<?php } 
?>

<?php
function draw_footer() {
?>
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
                            <a href="../pages/profile.php">Access my profile</a>
                            </li>
                            <li>
                            <a href="../pages/ask.php">Add a question</a>
                            </li>
                            <li>
                            <a href="../pages/home.php">Get back home</a>
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
            <a href="../index.php"> Answerly</a>
            </div>
            <!-- Copyright -->
        </footer>
    </body>
</html>
<?php } 
?>

<?php
function draw_nav_bar($nav_type) {
    if ($nav_type == "full_filters") {
?>
    <div class="fixed-top">
<?php 
    }
?>
    <nav class="navbar navbar-expand-lg navbar-light navbar-default <?php if ($nav_type != "full_filters") {?> fixed-top <?php } ?>">
        <div class="container">
            <?php
                if ($nav_type == "simple") {
            ?>
            <a class="navbar-brand"></a>
            <?php
                } 
                else {
            ?>
            <a href="../pages/home.php" class="navbar-brand">Answerly</a>
            <?php 
                }
            ?>
            <?php
                if ($nav_type != "simple") {
            ?>
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
                <?php 
                    }
                ?>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0" type="submit" >Search</button>
                </form>
            </div>
        </div>
    </nav>
    
<?php
    if ($nav_type == "full_filters") {
?>
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
<?php 
    } 
} 
?>

<?php
function draw_home_question($type, $img, $user, $question, $info) {
?>
    <div class="wrapper home_question">
        <div class="media">
            <img src=<?="../resources/".$img?> class="align-self-start mr-3" alt="profile pic">
            <div class="media-body">
                <h1 class="mt-0"><a id="question-header" href="/pages/question.php"><?=$question?></a></h1>
                <p><a href="/pages/profile.php"><?=$user?></a></p>
                <p><?=$info?></p>
            </div>
        </div>
        <?php
        if ($type != "guest") {
        ?>
        <div class="icons">
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
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
function draw_search_result($img, $question, $info) {
?>
    <li class="media mt-3">
        <a class="pr-3" href="..pages/profile.php">
            <img src=<?="../resources/".$img?> alt="Generic placeholder image">
        </a>
        <a class="search_result" href="question.php">
            <div class="media-body">
                <h2 class="mt-0"><?=$question?></h2>
                <p><?=$info?></p>
            </div>
        </a>
    </li>
<?php
}
?>