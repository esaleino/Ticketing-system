<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
    include VALIDATIONS_PATH . "registration-validation.php";
    include HANDLERS_PATH . "registration-handler.php";
    include COMPONENTS_PATH . "db-connect.php";
    $errors = reg_validation($_POST);
    $hasErrors = false;
    foreach ($errors as $key)
    {
        if (!empty($key))
        {
            $hasErrors = true;
            break;
        }
    }
    header('Content-Type: application/json');
    if ($hasErrors)
    {
        http_response_code(400);
        $response['message'] = "Error validating data from client";
    }
    else
    {
        $conn = DbConnect::createConnection();
        $msg = reg_handling($_POST, $conn);
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
    echo json_encode($response);

}

?>