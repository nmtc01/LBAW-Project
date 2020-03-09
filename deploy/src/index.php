<?php
    include_once "templates/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>    
        <?php 
            draw_nav_bar("simple");
        ?>
    </header>


    <div class="wrapper container">
        <form class="form-signin">
            <h2 class="form-signin-heading text-center display-3">Answerly</h2>

            <button id="api" class="btn  btn-lg btn-block">Sign in with Google</button>
            <input type="text" class="form-control" name="username" placeholder="Email Address">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <button type="button" class="btn  btn-lg btn-block">Login</button>
            
            <div id="register">
                <p>Don't have an account? <a href="pages/register.php">Register</a></p>
            </div>

        </form>

    </div>
    <div class="popular">
        <h1 id="pop_questions">Popular questions</h1>
<?php
    $type = "guest";
    $img = "../resources/bob_iger.jpeg";
    $user = "nmtc01";
    $question = "In what order should I watch all the mcu?";
    $info = "I'm about to start a marathon of marvel movies. I have never seen one and I would like to know what do you guuys think is the best order to see them. I heard that there are at least 20 ways to watch it.";

    for($i = 0; $i < 10; $i++){ 
        draw_home_question($type, $img, $user, $question, $info);
    }
?>
    </div>
<?php
    draw_footer();
?>