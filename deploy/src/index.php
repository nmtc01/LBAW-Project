<?php
include_once "templates/tpl_common.php";

draw_main_document();
?>

    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <header>
        <?php
        draw_nav_bar("simple", false);
        ?>
    </header>

    <div>
        <?php
            draw_side_pair();
        ?>
    </div>

    <div class="col-md-5 container-fluid">
        <button id="add_btn" class="input-button" data-toggle="modal" data-target="#ask_something">
            What is your question?
        </button>

        <?php
        $type = "auth";
        $img = array("bob_iger.jpeg", "will-ferrel.jpg", "robert-jr.jpg");
        $user = array("nmtc01", "will99", "cr7fan");
        $question = array("In what order should I watch all the mcu?",
                          "Is it possible for Leicester City to defeat Aston Villa in the English Premier League?",
                          "Do you think that Ronaldo is going to play in the next world cup?");

        for ($i = 0; $i < 2; $i++) {
            draw_home_question($type, $img[0], $user[0], $question[0]);
            draw_home_question($type, $img[1], $user[1], $question[1]);
            draw_home_question($type, $img[2], $user[2], $question[2]);
        }
        ?>
    </div>

    <?php
    draw_footer();
    ?>