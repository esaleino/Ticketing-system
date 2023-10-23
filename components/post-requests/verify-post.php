<?php
if (isset($_GET['token']))
{
    include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
    include QUERIES_PATH . "db-connect.php";
    include QUERIES_PATH . "db-query-functions.php";
    $conn = DbConnect::createConnection();
    $token = $_GET['token'];
    $status = verifyUser($token, $conn);
    header('Content-Type: application/json');
    if ($status)
    {
        http_response_code(200);
        echo json_encode(["message" => "User verified"]);
    }
    else
    {
        http_response_code(400);
        echo json_encode(["message" => "User not verified"]);
    }
    $conn->close();
}
else
{
    http_response_code(400);
    echo json_encode(["message" => "No token provided"]);
}
?>