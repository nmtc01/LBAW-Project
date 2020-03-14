<?php
    include_once "../templates/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <header>
        <?php
            draw_nav_bar("full", true);
        ?>
    </header>

    <div>
        <?php
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
        draw_side_bar($type_r, $title_r, $labels_r, $links_r);
        draw_side_bar($type_l, $title_l, $questions_l, $links_l);
        ?>
    </div>

    <div class="col-md-5 container-fluid">
        <div id="search_title">
            <h1>Search Results</h1>
        </div>
        <?php
        $img = "bob_iger.jpeg";
        $question = "Adam Sandler's cool experiment";
        $info = "Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing research for my next movie and I want it to be 100% cientifically correct... ";
        
        for($i = 0; $i < 5; $i++){
            draw_search_result($img, $question, $info);
        }
        ?>
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
<?php
    draw_footer();
?>