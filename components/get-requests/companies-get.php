<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['api_key']) && $_GET['api_key'] === getenv('API_KEY_ADMIN'))
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
        include QUERIES_PATH . "db-connect.php";
        include QUERIES_PATH . "db-query-functions.php";
        $conn = DbConnect::createConnection();
        $data = getCompanies($conn);
        $conn->close();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    else
    {
        header('Content-Type: application/json');
        http_response_code(403);
        echo json_encode('Access forbidden.');
    }
}
else
{
    header('Content-Type: application/json');
    http_response_code(405);
    echo json_encode('Method not allowed.');
}

?>