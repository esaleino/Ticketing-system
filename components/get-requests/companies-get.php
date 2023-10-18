<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    include __DIR__ . "/../../config.php";
    include COMPONENTS_PATH . "db-connect.php";
    include QUERIES_PATH . "db-query-functions.php";
    $conn = DbConnect::createConnection();
    $data = getCompanies($conn);
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($data);
}
else
{
    http_response_code(405);
    echo 'Method not allowed.';
}

?>