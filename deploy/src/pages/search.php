<?php
    include_once "../templates/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <header>
        <?php
            draw_nav_bar("full", true);
        ?>
    </header>

    <div>
        <?php
            draw_side_pair();
        ?>
    </div>

    <div class="col-md-5 container-fluid">
        <div id="search_title">
            <h1>Search Results</h1>
        </div>
        <?php
        $img = "bob_iger.jpeg";
        $question = "Adam Sandler's cool experiment";
        $info = "Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing research for my next movie and I want it to be 100% cientifically correct... ";
        
        for($i = 0; $i < 5; $i++){
            draw_search_result($img, $question, $info);
        }
        ?>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a id="previous" class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a id="next" class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
<?php
    draw_footer();
?>