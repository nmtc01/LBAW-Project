<?php
    include_once("../templates/tpl_common.php");

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/about.css">
</head>

<body>
    <header>    
        <?php 
            draw_nav_bar("full", false);
        ?>
    </header>

    <section id="about">
        <h1>Error 404</h1>
        <p>We are sorry.</p>
        <p>The page you are looking for cannot be found.</p>
        <p>Please go back to our home page or try to find what you are looking for by using our search bar.</p>
    </section>

<?php
    draw_footer();
?>