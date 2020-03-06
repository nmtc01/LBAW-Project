<?php
    include_once "../template/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/list_format.css">
    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <header>
        <div class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light navbar-default">
                <div class="container">
                    <a href="#" class="navbar-brand">Answerly</a>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <div class="filters">
                <form>
                    <label>Filter:</label>
                    <div id="filters-bar">
                        <div class="checkboxes">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Answered</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">+Positive Score</label>
                            </div>
                        </div>
                        <div class="dates">
                            <div>
                                <label>Start</label>
                                <input type="date" value="dd-mm-yyyy">
                            </div>
                            <div>
                                <label>End</label>
                                <input type="date" value="dd-mm-yyyy">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <div class="media">
            <div class="media-body">
                <h1 class="mt-0">Search Results</h1>
                <ul class="list-unstyled">
                    <li class="media mt-3">
                        <a class="pr-3" href="#">
                            <img src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body">
                            <h2 class="mt-0">Adam Sandler's cool experiment</h2>
                            <p>Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing research for my next movie and I want it to be 100% cientifically correct... </p>
                        </div>
                    </li>
                    <li class="media mt-3">
                        <a class="pr-3" href="#">
                            <img src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body">
                            <h2 class="mt-0">Adam Sandler's cool experiment</h2>
                            <p>Hey guys! Can anyone tell me if mixing coke with mentos creates an explosive reaction? I'm doing research for my next movie and I want it to be 100% cientifically correct... </p>
                        </div>
                    </li>
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