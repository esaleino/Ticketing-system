<?php

include "../handlers/login-handling.php";
include "../db-connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $conn = DbConnect::createConnection();
    $msg = login_handling($_POST, $conn);
    if ($msg['error'])
    {
        http_response_code(400);
    }
    else
    {
        http_response_code(200);
    }
    $response['message'] = $msg['message'];
    $conn->close();
}
else
{
    http_response_code(405);
    echo 'Method not allowed.';
}
?>