<?php
function draw_reported_tables($ids){
?>
    <div class="tab-content py-4">
        <?php
            $titles1 = array(
                0 => "Questions",
                1 => "Answers",
                2 => "Comments"
            );
            $reports1 = array(
                $questions = array(
                    0 => array("Will Erling Braut Haaland be a future winner of the Ballon d’Or?","nmtc01","It seemed inevitable that the Norwegian would hit the ground running when he joined in January from RB Salzburg, but few could have predicted the extent to which he would shine. Immediately, he began making an impact in the Bundesliga, scoring on his debut but we had to wait until tonight to see him in a yellow and black jersey in the Champions League."),
                    1 => array("Will Erling Braut Haaland be a future winner of the Ballon d’Or?","nmtc01","It seemed inevitable that the Norwegian would hit the ground running when he joined in January from RB Salzburg, but few could have predicted the extent to which he would shine. Immediately, he began making an impact in the Bundesliga, scoring on his debut but we had to wait until tonight to see him in a yellow and black jersey in the Champions League."),
                    2 => array("Will Erling Braut Haaland be a future winner of the Ballon d’Or?","nmtc01","It seemed inevitable that the Norwegian would hit the ground running when he joined in January from RB Salzburg, but few could have predicted the extent to which he would shine. Immediately, he began making an impact in the Bundesliga, scoring on his debut but we had to wait until tonight to see him in a yellow and black jersey in the Champions League."),
                    3 => array("Will Erling Braut Haaland be a future winner of the Ballon d’Or?","nmtc01","It seemed inevitable that the Norwegian would hit the ground running when he joined in January from RB Salzburg, but few could have predicted the extent to which he would shine. Immediately, he began making an impact in the Bundesliga, scoring on his debut but we had to wait until tonight to see him in a yellow and black jersey in the Champions League.")
                ),
                $answers = array(
                    0 => array("In this example, the variable x is an int and Java will initialize it to 0 for you.", "pedro_dantas"),
                    1 => array("In this example, the variable x is an int and Java will initialize it to 0 for you.", "pedro_dantas"),
                    2 => array("In this example, the variable x is an int and Java will initialize it to 0 for you.", "pedro_dantas"),
                    3 => array("In this example, the variable x is an int and Java will initialize it to 0 for you.", "pedro_dantas")
                ),
                $comments = array(
                    0 => array("Please include the name of the object variable in the exception message.", "edu12345"),
                    1 => array("Please include the name of the object variable in the exception message.", "edu12345"),
                    2 => array("Please include the name of the object variable in the exception message.", "edu12345"),
                    3 => array("Please include the name of the object variable in the exception message.", "edu12345")
                )
            );
            draw_reported_tab(1, $ids[0], $titles1, $reports1, true);
            $titles2 = array(
                0 => "Username"
            );
            $reports2 = array(
                $users = array( 
                    0 => array("pedro_dantas", "this user was the origin of 10 reported elements"),
                    1 => array("nmtc01", "this user was the origin of 10 reported elements"),
                    2 => array("edu1234", "this user was the origin of 10 reported elements"),
                    3 => array("bob_mourato", "this user was the origin of 10 reported elements"),
                    4 => array("up201706162", "this user was the origin of 10 reported elements")
                )
            );
            draw_reported_tab(2, $ids[1], $titles2, $reports2, false);
            if(count($ids) == 3) {
                $titles3 = array(
                    0 => "Users",
                    1 => "Moderators"
                );
                $reports3 = array(
                    $users = array( 
                        0 => array("taskforce", "this user has a score of 10"),
                        1 => array("geek4geeks", "this user has a score of 10"),
                        2 => array("ivo899", "this user has a score of 10"),
                        3 => array("bob_iger", "this user has a score of 10"),
                        4 => array("up201706162", "this user has a score of 10")
                    ),
                    $moderators = array( 
                        0 => array("taskforce", "this user has a score of 10"),
                        1 => array("geek4geeks", "this user has a score of 10"),
                        2 => array("ivo899", "this user has a score of 10"),
                        3 => array("bob_iger", "this user has a score of 10"),
                        4 => array("up201706162", "this user has a score of 10")
                    ),
                );
                draw_reported_tab(3, $ids[2], $titles3, $reports3, false);
            }
        ?>
    </div>
<?php
}
?>

<?php
function draw_reported_tab($nr, $id, $titles, $reports, $isActive) {
?>
    <div class="tab-pane <?php if($isActive){ ?> active<?php } ?>" id="<?=$id?>">
        <div class="wrapper-2">
            <?php
            for($i = 0; $i < count($titles); $i++) {
            ?>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                    <?=$titles[$i];?>
                </button>
                <?php
                for($j = 0; $j < count($reports[$i]); $j++) {
                    $k = ($i+1) * count($reports[$i]) + $j; 
                ?>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#reported_elem<?=$k.$nr?>"><?=$reports[$i][$j][0]?></button>
                <?php
                draw_reported_element($reports[$i][$j], $k, $nr);
                }
                ?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
<?php
}
?>

<?php
function draw_reported_element($info, $id, $nr) {
?>
    <div class="modal fade" id="reported_elem<?=$id.$nr?>" tabindex="-1" role="dialog" aria-labelledby="reported_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reported Element</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1><?=$info[0]?></h1>
                    <p><a href="../pages/profile.php"><?=$info[1]?></a></p>
                    <?php
                    if (count($info) == 3) {
                    ?>
                    <p><?=$info[2]?></p>
                    <?php
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <?php
                        if($nr == 1) {
                        ?>
                        Edit
                        <?php
                        } else if ($nr == 2) {
                        ?>
                        View
                        <?php
                        } else {
                        ?>
                        Change status
                        <?php
                        }
                        ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>