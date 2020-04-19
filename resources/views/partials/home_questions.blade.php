<div class="col-md-5 container-fluid">
    <button id="add_btn" class="input-button" data-toggle="modal" data-target="#ask_something">
        What is your question?
    </button>

    <div class="wrapper home_question container-fluid">
        <div class="row">
            <div id="prof_info" class="col-2 text-center">
                <img src="../resources/adam_sandler.jpg"{{--.$img--}} class="row-10" alt="profile pic">
                <p><a class="row-2 d-none d-sm-block" href="/pages/profile.php">nmtc01{{--$user--}}</a></p>
            </div>
            <div class="col-10">
                <h1><a id="question-header" href="/pages/question.php">Cenas?{{--$question--}}</a></h1>
            </div>
        </div>
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
        <?php
        /*if ($type != "guest") {
        ?>
            <a class="icon" href="#">
                <i class="fas fa-arrow-right fa-lg"> follow</i>
            </a>
        <?php
        }*/
        ?>
        </div>
    </div>
</div>