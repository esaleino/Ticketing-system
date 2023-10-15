<?php
include "../queries/db-query-functions.php";
function reg_handling($data, $conn)
{
    $status_company = verifyCompany($data['company_name'], $data['company_code'], $conn);
    if (!$status_company)
    {
        $errors['error'] = true;
        $errors['message'] = "Company name and code do not match";
        return $errors;
    }
    $status_user = registerUser($data, $conn);
    if (!$status_user)
    {
        $errors['error'] = true;
        $errors['message'] = "Username already exists";
        return $errors;
    }
    return array('error' => false, 'message' => "Registration successful");
}



?>