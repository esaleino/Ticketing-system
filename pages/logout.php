<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$page = "logout";
include COMPONENTS_PATH . "header.php";
var_dump($_SESSION);
session_unset();
session_destroy();
var_dump($_SESSION);
curl_close($ch);
include COMPONENTS_PATH . "footer.php";
?>