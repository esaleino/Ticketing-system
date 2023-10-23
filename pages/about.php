<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$page = "about";
$components_path = "../components/";
include $components_path . "header.php";
include $components_path . "footer.php";
echo '<link rel="stylesheet" href="' . CSS . 'text-content.css" />';
?>

<div class="body-frame">
    <div class="content-frame">
        <div class="row-heading">
            <h1 class="body-title">About us</p>
        </div>
        <div class="body-row">
            <div class="content">
                <p class="text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="content"><img class="body-image" src="https://picsum.photos/300/300" /></div>
        </div>
    </div>
</div>