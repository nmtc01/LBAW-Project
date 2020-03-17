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
                0 => "Dapibus ac facilisis in",
                1 => "Dapibus ac facilisis in",
                2 => "Dapibus ac facilisis in",
                3 => "Dapibus ac facilisis in",
                4 => "Dapibus ac facilisis in"
            );
            draw_reported_tab($ids[0], $titles1, $reports1, true);
            $titles2 = array(
                0 => "Username"
            );
            $reports2 = array(
                0 => "Dapibus ac facilisis in",
                1 => "Dapibus ac facilisis in",
                2 => "Dapibus ac facilisis in",
                3 => "Dapibus ac facilisis in",
                4 => "Dapibus ac facilisis in"
            );
            draw_reported_tab($ids[1], $titles2, $reports2, false);
            if(count($ids) == 3) {
                $titles3 = array(
                    0 => "Users",
                    1 => "Moderators"
                );
                $reports3 = array(
                    0 => "Dapibus ac facilisis in",
                    1 => "Dapibus ac facilisis in",
                    2 => "Dapibus ac facilisis in",
                    3 => "Dapibus ac facilisis in",
                    4 => "Dapibus ac facilisis in"
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
                for($j = 0; $j < count($reports); $j++) {
                ?>
                <button type="button" class="list-group-item list-group-item-action"><?=$reports[$j]?></button>
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