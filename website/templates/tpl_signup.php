<?php 
function draw_card_promo() {
?>
    <div class="col-md-3 register-left my-auto">
        <h1><a href="../index.php">Answerly</a></h1>
        <p>Hope you have a lot of questions ready to be answered!</p>
    </div>
<?php
}
?>

<?php 
function draw_card_form($type) {
?>
    <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
               <?php
               draw_form($type);
               ?> 
                <div class="col-md-6 ml-auto">
                    <input type="submit" class="btnRegister" value=<?=$type?> />
                    <div class="align-middle d-flex justify-content-end">
                        <?php
                            if ($type == "Register") {
                        ?>
                        <a href="../pages/login.php">Sign In</a>
                        <?php
                            } else {
                        ?>
                        <a class="d-flex justify-content-end" href="../pages/register.php">Create account</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<?php 
function draw_form($type) {
?>
    <div class="row register-form">
        <?php
        if ($type == "Register") 
            draw_form_register();
        draw_form_login();
        ?>
    </div>
<?php
}
?>

<?php
function draw_form_register() {
?>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="First Name *" value="" />
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Last Name *" value="" />
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Your Email *" value="" />
        </div>
        <div class="form-group">
            <input type="date" class="form-control" value="">
        </div>
        <div class="form-group">
            <div class="maxl">
                <label class="radio inline">
                    <input type="radio" name="gender" value="male" checked>
                    <span> Male </span>
                </label>
                <label class="radio inline">
                    <input type="radio" name="gender" value="female">
                    <span>Female </span>
                </label>
            </div>
        </div>
    </div>
<?php
}
?>

<?php 
function draw_form_login() {
?>
    <div class="col-md-6 ml-auto">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username *" value="" />
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password *" value="" />
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
        </div>
        <div class="form-group" contentEditable="true">
            <textarea class="form-control" placeholder="Description *" value="" rows="5"></textarea>
        </div>
    </div>
<?php
}
?>