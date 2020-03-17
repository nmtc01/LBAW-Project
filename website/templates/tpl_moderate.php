<?php
function draw_reported_elements($ids){
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
                    0 => "Will Erling Braut Haaland be a future winner of the Ballon d’Or?",
                    1 => "Is it possible for Leicester City to defeat Aston Villa in the English Premier League?",
                    2 => "Do you think that Ronaldo is going to play in the next world cup?",
                    3 => "How can I learn C and C++?"
                ),
                $answers = array(
                    0 => "In this example, the variable x is an int and Java will initialize it to 0 for you.",
                    1 => "I am pointing to nothing.",
                    2 => "You don't deserve to be here.",
                    3 => "That doesn't matter at all. Go home!"
                ),
                $comments = array(
                    0 => " Please include the name of the object variable in the exception message.",
                    1 => "The best way to avoid this type of exception is to always check for null when you did not create the object yourself.",
                    2 => "Vote kick.",
                    3 => "That doesn't matter at all."
                )
            );
            draw_reported_tab($ids[0], $titles1, $reports1, true);
            $titles2 = array(
                0 => "Username"
            );
            $reports2 = array(
                $users = array( 
                    0 => "pedro_dantas",
                    1 => "nmtc01",
                    2 => "edu1234",
                    3 => "bob_mourato",
                    4 => "up201706162"
                )
            );
            draw_reported_tab($ids[1], $titles2, $reports2, false);
            if(count($ids) == 3) {
                $titles3 = array(
                    0 => "Users",
                    1 => "Moderators"
                );
                $reports3 = array(
                    $users = array( 
                        0 => "taskforce",
                        1 => "geek4geeks",
                        2 => "ivo899",
                        3 => "bob_iger",
                        4 => "up201706162"
                    ),
                    $moderators = array( 
                        0 => "tiagoboldt",
                        1 => "nmtc01",
                        2 => "edu1234",
                        3 => "bob_mourato",
                        4 => "pedro_dantas"
                    )
                );
                draw_reported_tab($ids[2], $titles3, $reports3, false);
            }
        ?>
    </div>
<?php
}
?>

<?php
function draw_reported_tab($id, $titles, $reports, $isActive) {
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
                ?>
                <button type="button" class="list-group-item list-group-item-action"><?=$reports[$i][$j]?></button>
                <?php
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