<?php
include_once "../templates/tpl_common.php";

draw_main_document();
?>

<link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <header>
        <?php
        draw_nav_bar("full_nav");
        ?>
    </header>

    <button class="input-button">
        What is your question?
    </button>

    <?php
    $type = "auth";
    $img = "bob_iger.jpeg";
    $user = "nmtc01";
    $question = "In what order should I watch all the mcu?";
    $info = "I'm about to start a marathon of marvel movies. I have never seen one and I would like to know what do you guuys think is the best order to see them. I heard that there are at least 20 ways to watch it.";

    for ($i = 0; $i < 10; $i++) {
        draw_home_question($type, $img, $user, $question, $info);
    }
    ?>

    <div class="sidenav	d-none d-sm-block">
        <div class="elements">
            <a href="#">Sports</a>
            <a href="#">Movies</a>
            <a href="#">TV</a>
            <a href="#">Philosophy</a>
            <a href="#">Science</a>
        </div>
    </div>

    <?php
    draw_footer();
    ?>