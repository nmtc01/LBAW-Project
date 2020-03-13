<?php
include_once "templates/tpl_common.php";

draw_main_document();
?>

    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <header>
        <?php
        draw_nav_bar("full_nav");
        ?>
    </header>

    <div class="col-sm-5">
        <?php
        $type = "left";
        $label = "Popular labels";
        $info = array(
            0 => "#Medicine",
            1 => "#Sports",
            2 => "#Science"
        );
        draw_side_bar($type, $label, $info);
        ?>
    </div>

    <div class="col-sm-5 container-fluid">
        <button id="add_btn" class="input-button">
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