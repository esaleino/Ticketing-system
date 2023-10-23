<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$page = "logout";
include COMPONENTS_PATH . "header.php";
session_unset();
session_destroy();
include COMPONENTS_PATH . "footer.php";
?>
<div>
    <h1>Logged out</h1>
    <p>You have been logged out.</p>
</div>