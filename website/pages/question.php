<?php
    include_once "../templates/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/question.css">
    <link rel="stylesheet" href="../css/list_format.css">
</head>

<body>
    <header>
        <?php 
            draw_nav_bar("full_nav");
        ?>
    </header>

    <div class="wrapper">

        <div class="media">
        <a class="pr-3" href="profile.php">
            <img src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
        </a>
            <div class="media-body">
                <h1 class="mt-0">In what order should I watch all the mcu?</h1>
                <p><a href="/pages/profile.php">pedro_dantas</a></p>
                <p>I'm about to start a marathon of marvel movies. I have never seen one and I would like to know what do you guuys think is the best order to see them. I heard that there are at least 20 ways to watch it.</p>

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
                    <button class="btn my-2 my-sm-0" type="submit">Answer</button>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1"></label>
                    <textarea class="form-control" placeholder="Do you want to comment this question?"id="exampleFormControlTextarea1" rows="3"></textarea>
                    <button class="btn my-2 my-sm-0" type="submit">Comment</button>
                </div>

                <h2 class="mt-0">Comments</h2>

                <div class="media-body">
                    <div class="comment">
                        <p>
                        <a href="profile.php" class="username">nmtc01</a>
                        <br>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    </div>
                    <div class="comment">
                        <p>
                        <a href="profile.php" class="username">pedro_dantas</a>
                        <br>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    </div>
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

<?php
    draw_footer();
?>