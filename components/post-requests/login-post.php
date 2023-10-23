<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
    include HANDLERS_PATH . "login-handler.php";
    include QUERIES_PATH . "db-connect.php";
    session_set_cookie_params(900);
    session_start();
    $conn = DbConnect::createConnection();
    $msg = login_handling($_POST, $conn);
    if ($msg['error'])
    {
        http_response_code(400);
        $response = array(
            'message' => $msg['message']
        );
    }
    else if ($msg['user']['email_verified'] !== 0)
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $msg['user'];
        $url = PAGES . 'user.php';
        http_response_code(200);
        $response = array(
            'message' => $msg['user'],
            'redirect' => $url
        );
    }
    else
    {
        http_response_code(400);
        $response = array(
            'message' => "Email not verified"
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    $conn->close();
}
else
{
    http_response_code(405);
    header('Content-Type: application/json');
    $response['message'] = 'Method not allowed.';
    echo json_encode($response);
}
?>