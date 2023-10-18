<?php
include QUERIES_PATH . "db-query-functions.php";
function login_handling($data, $conn)
{
    $status_login = loginUser($data, $conn);
    if (!$status_login)
    {
        return array('error' => true, 'message' => "Username or password is incorrect");
    }
    $status_user = getUser($data['l_uname'], $conn);
    if (!$status_user)
    {
        return array('error' => true, 'message' => "Something went wrong - please try again later");
    }
    return array('error' => false, 'message' => "Login successful", 'user' => $status_user);
}
?>