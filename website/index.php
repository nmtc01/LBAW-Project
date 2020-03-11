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

    <div id="add_lg_button">
        <button class="input-button col-sm-5 center-block">
            What is your question?
        </button>
    </div>

    <?php
    $type = "auth";
    $img = "bob_iger.jpeg";
    $user = "nmtc01";
    $question = "In what order should I watch all the mcu?";

    for ($i = 0; $i < 10; $i++) {
        draw_home_question($type, $img, $user, $question);
    }
    ?>

    <?php
    draw_footer();
    ?>