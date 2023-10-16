<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$style_forms = true;
$page = "login";
$js = array("login.js");
include COMPONENTS_PATH . "header.php";
echo '<script>var loginPost = "' . POST_REQUESTS . 'login-post.php";</script>';
?>
<div class="form-container">
    <form class="form-box" id="login-form">
        <div class="form-title">
            <div class="title-text">Login</div>
            <div class="title-text " id="status-message" style="display:none"></div>
        </div>
        <div class="form-row">
            <div class="input-container">
                <label class="l-text" for="l_uname">Username</label>
                <input class="input-box" placeholder="Username" type="text" name="l_uname" id="l_uname" />
                <label class="error-field" id="l_uname_error" name="l_uname_err"></label>
            </div>
            <div class="input-container">
                <label class="l-text" for="l_pass">Password</label>
                <input class="input-box" placeholder="Password" type="password" name="l_pass" id="l_pass" />
                <label class="error-field" id="l_pass_error" name="l_pass_err"></label>
            </div>
        </div>
        <div class="form-submit">
            <button type="submit" class="s-button">Submit</button>
        </div>
    </form>
</div>
<?php
include COMPONENTS_PATH . "footer.php"; ?>