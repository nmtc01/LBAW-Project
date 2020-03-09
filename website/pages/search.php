<?php
    include_once "../templates/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/list_format.css">
    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <header>
        <?php
            draw_nav_bar("full_filters");
        ?>
    </header>

    <div class="wrapper container">
        <div class="media">
            <div class="media-body">
                <h1 class="mt-0">Search Results</h1>
                <ul class="list-unstyled">
                    <?php
                    $img = "bob_iger.jpeg";
                    $question = "Adam Sandler's cool experiment";
                    $info = "Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing research for my next movie and I want it to be 100% cientifically correct... ";
                    
                    for($i = 0; $i < 5; $i++){
                        draw_search_result($img, $question, $info);
                    }
                    ?>
                </ul>
            </div>   
        </div>
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