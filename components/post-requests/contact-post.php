<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
    include HANDLERS_PATH . "contact-handler.php";
    include QUERIES_PATH . "db-connect.php";


    $conn = DbConnect::createConnection();
    header('Content-Type: application/json');
    $msg = contactHandling($_POST, $conn);
    $conn->close();
    echo json_encode($msg);
}
else
{
    http_response_code(405);
    header('Content-Type: application/json');
    $response['message'] = 'Method not allowed.';
    echo json_encode($response);
}
?>