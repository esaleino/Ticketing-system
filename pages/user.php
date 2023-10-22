<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$page = "user";
$css[] = "forms.css";
if ($_SESSION['loggedin'] == true)
{
    $user = $_SESSION['user'];
    if ($user['role'] == "unassigned")
    {
        header("Location: " . PAGES . "error.php");
    }
    else
    {
        $js[] = "user.js";
        include COMPONENTS_PATH . "user-header.php";
        include ROLES_PATH . $user['role'] . ".php";
    }
}
else
{
    header("Location: " . PAGES . "login.php");
}

include COMPONENTS_PATH . "footer.php"; ?>