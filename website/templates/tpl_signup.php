<?php
function draw_signup_form($type) {

    include_once "tpl_common.php";

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
            <div class="col-md-3 register-left my-auto">
                <h1><a href="../index.php">Answerly</a></h1>
                <p>Hope you have a lot of questions ready to be answered!</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row register-form">
                            <?php
                            if ($type == "register") {
                            ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                                </div>
                                <div class="form-group" contentEditable="true">
                                    <textarea class="form-control" placeholder="Description *" value="" rows="5"></textarea>
                                </div>
                                <input type="submit" class="btnRegister" value="Register" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>

<?php 
}
?>