<?php
include QUERIES_PATH . "db-query-functions.php";
function reg_handling($data, $conn)
{
    $status = [];
    $status['company'] = verifyCompany($data['company_name'], $data['company_code'], $conn);
    if (!$status['company'])
    {
        $errors['error'] = true;
        $errors['message'] = "Company name and code do not match";
        return $errors;
    }
    $c_id = $status['company'];
    $status['company'] = "ok";

    $status['email_exists'] = findEmail($data['email'], $conn);
    if ($status['email_exists'])
    {
        $errors['error'] = true;
        $errors['message'] = "Email already exists";
        return $errors;
    }

    $status['email_exists'] = "ok";

    $status['user_exists'] = findUser($data['uname'], $conn);
    if ($status['user_exists'])
    {
        $errors['error'] = true;
        $errors['message'] = "Username already exists";
        return $errors;
    }

    $status['user_exists'] = "ok";

    $status_user = registerUser($data, $conn, $c_id);
    if (!$status_user)
    {
        $errors['error'] = true;
        $errors['message'] = "Something went wrong - please try again later";
        return $errors;
    }
    return ['error' => false, 'message' => "Registration successful"];
}



?>