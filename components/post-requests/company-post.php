<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_GET['api_key']) && $_GET['api_key'] === getenv('API_KEY_ADMIN'))
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
        include HANDLERS_PATH . "company-handler.php";
        include QUERIES_PATH . "db-connect.php";
        $conn = DbConnect::createConnection();
        header('Content-Type: application/json');
        $msg = companyHandling($_POST, $conn);
        if ($msg['status'] === "success")
        {
            http_response_code(200);
        }
        else
        {
            http_response_code(400);
        }
        echo json_encode($msg);
        $conn->close();
    }
    else
    {
        http_response_code(401);
        header('Content-Type: application/json');
        $response['message'] = 'Unauthorized.';
        echo json_encode($response);
        exit();
    }
}
else
{
    http_response_code(405);
    header('Content-Type: application/json');
    $response['message'] = 'Method not allowed.';
    echo json_encode($response);
}

?>