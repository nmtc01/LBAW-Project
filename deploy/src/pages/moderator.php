<?php
include_once "../templates/tpl_common.php";
include_once "../templates/tpl_moderate.php";

draw_main_document();
?>

    <link rel="stylesheet" href="../css/modmin.css">
</head>

<body>   
  <header>
      <?php 
        draw_nav_bar("full", false);
      ?>
  </header>

  <div class="container moderate">
        <?php
        $targets = array(
          0 => "reports",
          1 => "reported-users"
        );
        ?>

        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a href="" data-target=<?="#".$targets[0]?> data-toggle="tab" class="nav-link active">Reports</a>
          </li>
          <li class="nav-item">
            <a href="" data-target=<?="#".$targets[1]?> data-toggle="tab" class="nav-link">Reported Users</a>
          </li>
        </ul>

        <?php
          draw_reported_tables($targets, false);
        ?>
  </div>

<?php
draw_footer();
?>
