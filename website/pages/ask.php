<?php
    include_once "../templates/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/list_format.css">
    <link rel="stylesheet" href="../css/ask.css">
</head>
<body>
    <header>
        <?php 
            draw_nav_bar("full_nav");
        ?>
    </header>
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-3">
                <img class="mr-3" src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
            </div>
            <div class="col-sm-9">
                <div class="media-body">
                    <h1 class="mt-0 row">Add a question</h1>
                    <form>
                        <div class="form-group row">
                            <label for="exampleFormControlTextarea1">Write your question here</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <a href="#" class="badge badge-dark badge-pill row">+</a>
                        <div id="form-buttons" class="form-group row">
                            <input type="file" class="form-control-file col-sm-9" id="exampleFormControlFile1" accept="image/png, image/jpeg">
                            <button class="btn btn-primary btn-lg col-sm-3" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    draw_footer();
?>