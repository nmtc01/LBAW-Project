<?php
    include_once "../templates/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <header>    
        <nav class="navbar navbar-expand-lg navbar-light navbar-default fixed-top">
            <div class="container">
                <a class="navbar-brand"></a>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>


    <div class="wrapper">
        <form class="form-signin">
            <h2 class="form-signin-heading text-center display-3">Answerly</h2>

            <button id="api" class="btn  btn-lg btn-block">Sign in with Google</button>
            <input type="text" class="form-control" name="username" placeholder="Email Address">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <button type="button" onclick="location.href='pages/home.php';" class="btn  btn-lg btn-block">Login</button>
            
            <div id="register">
                Don't have an account? <a href="pages/register.php">Register</button>
            </div>

        </form>

    </div>


</body>

</html>