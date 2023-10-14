<?php
$page = "register";
$style_forms = true;
$components_path = "../components/";
$js = array("register.js");
include $components_path . "header.php";
$registerPost = $components_path . "post-requests/registration-post.php";
echo '<script>var registerPost = "' . $registerPost . '";</script>';
?>

<div class="form-container">
    <form class="form-box" id="registration-form">
        <div class="form-title">
            <div class="title-text">Registration form</div>
        </div>
        <div class="form-row">
            <div class="input-container">
                <label class="l-text" for="fname">First name</label>
                <input class="input-box" placeholder="First name" name="fname" type="text" id="fname" required />
                <label class="error-field" id="fname_error" name="fname_err"></label>
            </div>
            <div class="input-container">
                <label class="l-text" for="lname">Last name</label>
                <input class="input-box" placeholder="Last name" name="lname" type="text" id="lname" required />
                <label class="error-field" id="lname_error" name="lname_err"></label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-container">
                <label class="l-text" for="email">Email</label>
                <input class="input-box" placeholder="Email" name="email" type="email" id="email" required />
                <label class="error-field" id="email_error" name="email_err"></label>
            </div>
            <div class="input-container">
                <label class="l-text" for="phone">Phone</label>
                <input class="input-box" placeholder="Phone" name="phone" type="tel" id="phone" required />
                <label class="error-field" id="phone_error" name="phone_err"></label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-container">
                <label class="l-text" for="pass">Password</label>
                <input class="input-box" placeholder="Password" name="pass" type="password" id="pass" required />
                <label class="error-field" id="pass_error" name="pass_err"></label>
            </div>
            <div class="input-container">
                <label class="l-text" for="cpass">Confirm Password</label>
                <input class="input-box" placeholder="Confirm Password" name="cpass" type="password" id="cpass"
                    required />
                <label class="error-field" id="cpass_error" name="cpass_err"></label>

            </div>
        </div>
        <div class="form-row">
            <div class="input-container">
                <label class="l-text" for="company_name">Company</label>
                <input class="input-box" placeholder="Company" name="company_name" type="text" id="company_name"
                    required />
                <label class="error-field" id="company_name_error" name="company_name_err"></label>
            </div>
        </div>
        <div class="form-submit">
            <button type="submit" class="s-button">Submit</button>
        </div>
    </form>
</div>
<?php

include $components_path . "footer.php"; ?>