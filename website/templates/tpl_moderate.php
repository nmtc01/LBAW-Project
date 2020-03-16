<?php
function draw_reported_elements(){
?>
<div class="tab-content py-4">
    <?php
        $ids = array(

        );
        draw_reported_tab($ids[0], $titles1, $reports1);
        draw_reported_tab($ids[1], $titles2, $reports2);
        draw_reported_tab($ids[2], $titles3, $reports3);
    ?>
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
<?php
}
?>

<?php
function draw_reported_tab($id, $titles, $reports) {
?>
    <div class="tab-pane" id="<?=$id?>">
        <div class="wrapper-2">
            <div class="list-group">
                <?php
                for($i = 0; $i < count($titles); $i++) {
                ?>
                <button type="button" class="list-group-item list-group-item-action active">
                    <?=$titles[$i];?>
                </button>
                    <?php
                    for($j = 0; $j < count($reports)-1; $j++) {
                    ?>
                    <button type="button" class="list-group-item list-group-item-action"><?=$reports[$j]?></button>
                    <?php
                    }
                    ?>
                    <button type="button" class="list-group-item list-group-item-action overflow-auto"><?=$reports[count($reports)-1]?></button>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
?>