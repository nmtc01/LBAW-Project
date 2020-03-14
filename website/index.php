<?php
include_once "templates/tpl_common.php";

draw_main_document();
?>

    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <header>
        <?php
        draw_nav_bar("full", false);
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
        <button id="add_btn" class="input-button" data-toggle="modal" data-target="#ask_something">
            What is your question?
        </button>

        <?php
        $type = "auth";
        $img = "bob_iger.jpeg";
        $user = "nmtc01";
        $question = "In what order should I watch all the mcu?";

        for ($i = 0; $i < 10; $i++) {
            draw_home_question($type, $img, $user, $question);
        }
        ?>
    </div>

    <?php
    draw_footer();
    ?>