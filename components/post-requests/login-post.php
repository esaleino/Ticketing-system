<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include HANDLERS_PATH . "login-handler.php";
include COMPONENTS_PATH . "db-connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $conn = DbConnect::createConnection();
    /* $msg = login_handling($_POST, $conn);
    if ($msg['error'])
    {
        http_response_code(400);
    }
    else
    {
        http_response_code(200);
    } */
    $url = PAGES . 'user.php';
    $response = array(
        'message' => 'Login successful',
        'redirect' => $url
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    $conn->close();
}
else
{
    http_response_code(405);
    echo 'Method not allowed.';
}
?>