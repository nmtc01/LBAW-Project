<?php
    include_once "website/templates/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="website/css/index.css">
</head>

<body>
    <header>    
        <?php 
            draw_nav_bar("simple");
        ?>
    </header>


    <div class="wrapper">
        <form class="form-signin">
            <h2 class="form-signin-heading text-center display-3">Answerly</h2>

            <button id="api" class="btn  btn-lg btn-block">Sign in with Google</button>
            <input type="text" class="form-control" name="username" placeholder="Email Address">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <button type="button" onclick="location.href='home.php';" class="btn  btn-lg btn-block">Login</button>
            
            <div id="register">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>

        </form>

    </div>


</body>

</html>