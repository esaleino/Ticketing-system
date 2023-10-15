<?php
function login_handling($data, $conn)
{
    $status = loginUser($data['company_name'], $data['company_code'], $conn);
    if (!$status)
    {
        $errors['error'] = true;
        $errors['message'] = "Company name and code do not match";
        return $errors;
    }
    return array('error' => false, 'message' => "Login successful");
}
?>