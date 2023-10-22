<?php
include QUERIES_PATH . "db-query-functions.php";
function companyHandling($data, $conn)
{
    $regKey = generateRegistrationKey(10);
    $status = getCompany($data['company_name'], $conn);
    if ($status['status'] === "found")
    {
        return ["message" => "Company already exists.", "status" => "error"];
    }
    $status = addCompany(["company_name" => $data['company_name'], "regKey" => $regKey], $conn);
    if ($status['status'] === "error")
    {
        return ["message" => "Company already exists.", "status" => "error"];
    }
    $c_id = $status['c_id'];
    $status = getHash($data['ticket_id'], $conn);
    if (!$status)
    {
        return ["message" => "Ticket does not exist.", "status" => "error"];
    }
    $hash = $status;
    $status = registerUser(["uname" => $data['manager_username'], "email" => $data['manager_email'], "hash" => $hash, "full_name" => $data['manager_name']], $conn, $c_id);
    if (!$status)
    {
        return ["message" => "Company registration failed.", "status" => "error"];
    }
    $status = closeAdminTicket($data['ticket_id'], $conn);
    if (!$status)
    {
        return ["message" => "Fail closing ticket - company added", "status" => "error"];
    }
    return ["message" => "Company registered successfully.", "status" => "success"];
}
function generateRegistrationKey($length)
{
    $bytes = random_bytes($length);
    return strtoupper(bin2hex($bytes));
}
?>