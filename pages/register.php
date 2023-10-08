<?php
$page = "register";
$style_forms = true;
$components_path = "../components/";
include $components_path . "header.php";
?>

<div class="form-container">
    <form class="form-box">
        <div class="form-title">
            <div class="title-text">Registration form</div>
        </div>
        <div class="form-row">
            <div class="input-container">
                <label class="l-text" for="input-1">First name</label>
                <input class="input-box" placeholder="First name" type="text" id="input-1" />
            </div>
            <div class="input-container">
                <label class="l-text" for="input-2">Last name</label>
                <input class="input-box" placeholder="Last name" type="text" id="input-2" />
            </div>
        </div>
        <div class="form-row">
            <div class="input-container">
                <label class="l-text" for="input-3">Email</label>
                <input class="input-box" placeholder="Email" type="email" id="input-3" />
            </div>
            <div class="input-container">
                <label class="l-text" for="input-4">Phone</label>
                <input class="input-box" placeholder="Phone" type="tel" id="input-4" />
            </div>
        </div>
        <div class="form-row">
            <label class="l-text" for="input-5">Password</label>
            <input class="input-box" placeholder="Password" type="password" id="input-5" />
        </div>
        <div class="form-row">
            <label class="l-text" for="input-6">Confirm Password</label>
            <input class="input-box" placeholder="Confirm Password" type="password" id="input-6" />
        </div>
        <div class="form-submit">
            <button type="submit" class="s-button">Submit</button>
        </div>
    </form>
</div>
<?php

include $components_path . "footer.php"; ?>