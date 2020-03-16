<?php
include_once "../templates/tpl_common.php";

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

        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a href="" data-target="#reports" data-toggle="tab" class="nav-link active">Reports</a>
          </li>
          <li class="nav-item">
            <a href="" data-target="#reported-users" data-toggle="tab" class="nav-link">Reported Users</a>
          </li>
          <li class="nav-item">
            <a href="" data-target="#promote" data-toggle="tab" class="nav-link">Promote</a>
          </li>
        </ul>

        <div class="tab-content py-4">

          <div class="tab-pane active" id="reports">

            <div class="wrapper-2">


              <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                  Questions
                </button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
              </div>

              <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                  Answers
                </button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>

              </div>

              <div class="list-group overflow-auto">
                <button class="list-group-item list-group-item-action active">
                  Comments
                </button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>

              </div>


            </div>

          </div>

          <div class="tab-pane" id="reported-users">

            <div class="wrapper-2">

              <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                  Username
                </button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
              </div>

            </div>
          
          </div>

          <div class="tab-pane" id="promote">

            <div class="wrapper-2">

              <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                  Users
                </button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
              </div>

              <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                  Moderators
                </button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
                <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action">Vestibulum at eros</button>
              </div>

            </div>

          </div>

        </div>

  </div>



<?php
draw_footer();
?>
