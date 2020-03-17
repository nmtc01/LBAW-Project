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
                            <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Access</h3>
                            <ul class="list-unstyled">
                                <li>
                                <a href="../pages/profile.php">Access my profile</a>
                                </li>
                                <li>
                                <a href="../pages/admin.php">Moderate</a>
                                </li>
                                <li>
                                <a href="../index.php">Get back home</a>
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
                                <a href="../pages/about.php">About us</a>
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
function draw_nav_bar($nav_type, $filters) {
    if ($filters) {
    ?>
    <div class="fixed-top">
    <?php 
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light navbar-default <?php if (!$filters) {?> fixed-top <?php } ?>">
            <?php
                draw_simple_nav();
                if ($nav_type == "full") {
                    draw_full_nav();
                } 
                else {
            ?>
                    <li class="nav-item">
                        <button class="btn my-2 my-sm-0" type="submit">Sign In</button>
                    </li>
                <?php 
                }
            ?>
            </ul>
        </div>
    </nav>  
<?php
    if ($filters) {
        draw_filters();
    } 
    add_question_popup();
} 
?>

<?php
function draw_simple_nav() {
?>
    <a href="../index.php" class="navbar-brand">Answerly</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li>
                    <form class="form-inline" action="../pages/search.php">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </li>
<?php
}
?>

<?php
function draw_full_nav() {
?>
    <li class="nav-item">
        <button class="btn my-2 my-sm-0" data-toggle="modal" data-target="#ask_something" type="submit">Ask Something</button>
    </li>
    <li class="nav-link">
        <?=dropdown_profile_menu();?>
        <a class="fas fa-user fa-lg dropdown-toggle" id="dropdownMenuProfileButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
    </li>
    <li class="nav-link">
        <?=dropdown_notifications_menu();?>
        <a class="fas fa-bell fa-lg dropdown-toggle" id="dropdownMenuNotificationsButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
        </a>
    </li>
<?php
}
?>

<?php
function draw_filters() {
?>
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Filters
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body filters">
                        <form>
                            <div id="filters-bar container row">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Answered
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                            <label class="form-check-label" for="defaultCheck2">
                                                Positive Score +
                                            </label>
                                        </div>
                                    </div>
                                    <div class="dates col-sm-6 row my-auto">
                                        <div class="col-sm-6">
                                            <label>Start</label>
                                            <input type="date" value="dd-mm-yyyy">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>End</label>
                                            <input type="date" value="dd-mm-yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php    
}
?> 

<?php
function draw_side_pair() {
    $type_r = "right";
    $title_r = "Popular labels";
    $labels_r = array(
        0 => "#Medicine",
        1 => "#Sports",
        2 => "#Science",
        3 => "#Astronomy",
        4 => "#Programming"
    );
    $links_r = array(
        0 => "../index.php",
        1 => "../index.php",
        2 => "../index.php",
        3 => "../index.php",
        4 => "../index.php"
    );

    $type_l = "left";
    $title_l = "Following";
    $questions_l = array(
        0 => "Will Erling Braut Haaland be a future winner of the Ballon d’Or?",
        1 => "Is it possible for Leicester City to defeat Aston Villa in the English Premier League?",
        2 => "Do you think that Ronaldo is going to play in the next world cup?",
        3 => "How can I learn C and C++?"
    );
    $links_l = array(
        0 => "../pages/question.php",
        1 => "../pages/question.php",
        2 => "../pages/question.php",
        3 => "../pages/question.php",
        4 => "../pages/question.php"
    );

    draw_side_nav($type_r, $title_r, $labels_r, $links_r);
    draw_side_nav($type_l, $title_l, $questions_l, $links_l);
}
?>

<?php
function draw_side_nav($direction, $label, $info, $refs) {
?>
    <div id="sidenav_<?=$direction?>" class="sidenav d-none d-md-block">
        <label><?=$label?></label>
        <?php
        for($i = 0; $i < count($info); $i++) {
        ?>
        <a class="row" href="<?=$refs[$i]?>"><?=$info[$i]?></a>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
function draw_home_question($type, $img, $user, $question) {
?>
    <div class="wrapper home_question container-fluid">
        <div class="row">
            <div id="prof_info" class="col-2 text-center my-auto">
                <img src=<?="../resources/".$img?> class="row-10" alt="profile pic">
                <p><a class="row-2 d-none d-sm-block" href="/pages/profile.php"><?=$user?></a></p>
            </div>
            <div class="col-10">
                <h1 class="mt-0"><a id="question-header" href="/pages/question.php"><?=$question?></a></h1>
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
            <a class="icon" href="#">
                <i class="fas fa-arrow-right fa-lg"> follow</i>
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
    <div class="wrapper home_question container-fluid d-flex">
        <a class="d-none d-md-block" href="../pages/profile.php">
            <img src=<?="../resources/".$img?> alt="Generic placeholder image">
        </a>
        <a class="col-md-10" href="question.php">
            <div class="media-body">
                <h2 class="mt-0"><?=$question?></h2>
                <p><?=$info?></p>
            </div>
        </a>
    </div>
<?php
}
?>

<?php
function draw_answer($img, $user, $answer, $score) {
?>
    <li class="media mt-3">
        <a class="pr-3 col-sm-2 d-none d-sm-block" href="../pages/profile.php">
            <img src=<?="../resources/".$img?> alt="Generic placeholder image">
            <p>Score: <?=$score?></p>
        </a>
        <div class="media-body col-sm-10">
            <h3 class="mt-0"><a href="../pages/profile.php"><?=$user?></a></h3>
            <p><?=$answer?></p>
            <div class=icons-answers>
                <a class="icon-answers" href="#">
                    <i class="fas fa-thumbs-up"> 35</i>
                </a>
                <a class="icon-answers" href="#">
                    <i class="fas fa-thumbs-down"> 4</i>
                </a>
                <a class="icon-answers" href="#">
                    <i class="fas fa-comment"> 2</i>
                </a>
            </div>
        </div>
    </li>
<?php
}
?>

<?php
function add_question_popup(){
?>
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
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <a href="#" class="badge badge-dark badge-pill">+</a>
                    <div id="form-buttons" class="form-group row">
                        <input type="file" class="form-control-file col-sm-9" id="exampleFormControlFile1" accept="image/png, image/jpeg">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Add</button>
            </div>
            </div>
        </div>
    </div>
<?php
}
?>

<?php
function dropdown_profile_menu(){
?>
    <div class="dropdown">
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuProfileButton">
            <a class="dropdown-item" href="../pages/profile.php">Profile</a>
            <a class="dropdown-item" href="../index.php">Logout</a>
        </div>
    </div>
<?php
}
?>

<?php
function dropdown_notifications_menu(){
?>
    <div class="dropdown">
        <div id="notifications_menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuNotificationsButton">
        <?php
        $img = "bob_iger.jpeg";
        $user = "pedro_dantas";
        $question = "Will Erling Braut Haaland be a future winner of the Ballon d’Or?";
        for($i = 0; $i < 5; $i++) {
            draw_notification($img, $user, $question);
        }
        ?>
        </div>
    </div>
<?php
}
?>

<?php
function draw_notification($img, $user, $question){
?>
    <a id="notification" class="dropdown-item wrapper home_question container" href="../pages/question.php">
        <img class="col-2" src="../resources/<?=$img?>" alt="Generic placeholder image">
        <div class="col-10">
            <h4><span><?=$user?></span> answered</h4>
            <p><?=$question?></p>
        </div>
    </a>
<?php
}
?>