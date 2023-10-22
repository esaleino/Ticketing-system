<?php
array_push($js, "admin.js", "dashboard.js");
include PRIVATE_GET . "get-tickets.php";

echo '<script>var addCompanyPost = "' . POST_REQUESTS . "company-post.php?api_key=" . getenv('API_KEY_ADMIN') . '";</script>';
?>
<div class="main-content" id="main-content">
    <div class="dashboard">

        <div class="desktop-options">
            <a class="option" name="desktop-option" id="desktop-add-company" href="javascript:void(0);">Add
                Company</a>
            <a class="option" name="desktop-option" id="desktop-verify-users" href="javascript:void(0);">Verify
                Users</a>
            <a class="option" name="desktop-option" id="desktop-change-roles" href="javascript:void(0);">Change User
                Roles</a>
            <a class="option" name="desktop-option" id="desktop-add-users" href="javascript:void(0);">Add Users</a>
            <a class="option" name="desktop-option" id="desktop-view-data" href="javascript:void(0);">View Data</a>
        </div>
        <div class="mobile-menu">
            <div class="menu-icon" id="menu-icon">
                <a href="#">&#9776</a>
            </div>
            <div class="mobile-options">
                <a class="option" name="mobile-option" id="mobile-add-company" href="javascript:void(0);">Add
                    Company</a>
                <a class="option" name="mobile-option" id="mobile-verify-users" href="javascript:void(0);">Verify
                    Users</a>
                <a class="option" name="mobile-option" id="mobile-change-roles" href="javascript:void(0);">Change User
                    Roles</a>
                <a class="option" name="mobile-option" id="mobile-add-users" href="javascript:void(0);">Add Users</a>
                <a class="option" name="mobile-option" id="mobile-view-data" href="javascript:void(0);">View Data</a>
            </div>
        </div>
        <div class="content">
            <div id="add-company-content" name="content-div" class="form-content">
            </div>
            <div id="verify-users-content" name="content-div" class="form-content">Desktop and Mobile Verify Users
                Content</div>
            <div id="change-roles-content" name="content-div" class="form-content">Desktop and Mobile Change User Roles
                Content
            </div>
            <div id="add-users-content" name="content-div" class="form-content">Desktop and Mobile Add Users Content
            </div>
            <div id="view-data-content" name="content-div" class="form-content">Desktop and Mobile View Data Content
            </div>
        </div>

    </div>
</div>