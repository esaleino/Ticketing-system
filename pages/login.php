<?php
$style_forms = true;
$page = "login";
$components_path = "../components/";
include $components_path . "header.php";
?>
<div class="form-container">
    <form class="form-box">
        <div class="form-title">
            <div class="title-text">Login</div>
        </div>
        <div class="form-row">
            <div class="input-container">
                <label class="l-text" for="uname">Username</label>
                <input class="input-box" placeholder="Username" type="text" id="uname" />
            </div>
            <div class="input-container">
                <label class="l-text" for="pword">Password</label>
                <input class="input-box" placeholder="Password" type="password" id="pword" />
            </div>
        </div>
        <div class="form-submit">
            <button type="submit" class="s-button">Submit</button>
        </div>
    </form>
</div>
<?php
include $components_path . "footer.php"; ?>