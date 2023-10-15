<?php
include "../validations/registration-validation.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    /* $root = '../../';
    $path = __FILE__;
    $response = ['message' => $path]; */
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
        $response['message'] = "Success!";
    }
    echo json_encode($response);

}

?>