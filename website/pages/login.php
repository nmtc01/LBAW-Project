<?php
    include_once "../templates/tpl_common.php";
    include_once "../templates/tpl_signup.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/register.css">
</head>

<body>
    <header>
        <?php 
            draw_nav_bar("simple");
        ?>
    </header>

    <div class="container register">
        <div class="row">
            <?php
                draw_card_promo();
                draw_card_form("login");
            ?>
        </div>

    </div>

</body>

</html>