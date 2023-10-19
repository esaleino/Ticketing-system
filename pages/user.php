<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$page = "user";
var_dump($_SESSION);

if ($_SESSION['loggedin'] == true)
{
    $user = $_SESSION['user'];
    if ($user['role'] == "unassigned")
    {
        header("Location: " . PAGES . "error.php");
    }
    else
    {
        include COMPONENTS_PATH . "user-header.php";
        include PRIVATE_PATH . $user['role'] . ".php";
    }
}
else
{
    header("Location: " . PAGES . "login.php");
}

include COMPONENTS_PATH . "footer.php"; ?>