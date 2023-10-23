<?php
include QUERIES_PATH . "db-queries.php";
function verifyCompany($name, $code, $conn)
{
    global $verify_company;
    $stmt = $conn->prepare($verify_company);
    $stmt->bind_param("ss", $name, $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0)
    {
        return $result->fetch_assoc()['company_id'];
    }
    return false;
}
function getCompanies($conn)
{
    global $get_companies;
    $stmt = $conn->prepare($get_companies);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $companies = [];
    while ($row = $result->fetch_assoc())
    {
        array_push($companies, $row['company_name']);
    }
    return $companies;
}
function registerUser($data, $conn, $c_id)
{
    global $register_user;
    $stmt = $conn->prepare($register_user);
    $token = bin2hex(random_bytes(32));
    if (isset($data['pass']))
    {
        $hash = password_hash($data['pass'], PASSWORD_DEFAULT);
    }
    else
    {
        $hash = $data['hash'];
    }
    if (isset($data['fname']) && isset($data['lname']))
    {

        $fullName = $data['fname'] . " " . $data['lname'];
    }
    else
    {
        $fullName = $data['full_name'];
    }
    $stmt->bind_param("ssssis", $data['uname'], $data['email'], $fullName, $hash, $c_id, $token);
    $stmt->execute();
    if ($stmt->affected_rows > 0)
    {
        return true;
    }
    $stmt->close();
    return false;
}
function findEmail($email, $conn)
{
    global $get_email;
    $stmt = $conn->prepare($get_email);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0)
    {
        return true;
    }
    return false;
}
function findUser($user, $conn)
{
    global $get_user;
    $stmt = $conn->prepare($get_user);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0)
    {
        return true;
    }
    return false;
}
function loginUser($data, $conn)
{
    global $post_login;
    $stmt = $conn->prepare($post_login);
    $stmt->bind_param("s", $data['l_uname']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0)
    {
        $hash = $result->fetch_assoc()['password_hash'];
        if (password_verify($data['l_pass'], $hash))
        {
            return true;
        }
    }
    return false;
}
function getUser($user, $conn)
{
    global $get_user_details;
    $stmt = $conn->prepare($get_user_details);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0)
    {
        return $result->fetch_assoc();
    }
    return false;
}
function getCompanyTicket_reg($data, $conn)
{
    global $get_company_reg_ticket;
    $stmt = $conn->prepare($get_company_reg_ticket);
    $stmt->bind_param("s", $data['company_name']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0)
    {
        return ['result' => true, "id" => $result->fetch_assoc()['id']];
    }
    return ['result' => false];
}
function addCompanyTicket_reg($data, $conn)
{
    global $add_company_reg_ticket;
    $status = getCompanyTicket_reg($data, $conn);
    if ($status['result'])
    {
        return ["message" => "Registration ticket already exists.", "ticket_id" => $status['id'], "status" => "error"];
    }
    $stmt = $conn->prepare($add_company_reg_ticket);
    $hash = password_hash($data['m-pass'], PASSWORD_DEFAULT);
    $stmt->bind_param("sssssssss", $data['company_name'], $data['contact_name'], $data['contact_email'], $data['contact_phone'], $data['c-reason'], $data['m-email'], $data['m-uname'], $hash, $data['c-msg']);
    $stmt->execute();
    if ($stmt->affected_rows > 0)
    {
        return ["message" => "Registration ticket submitted successfully.", "ticket_id" => $stmt->insert_id, "status" => "success"];
    }
    $stmt->close();
    return ["message" => "Registration submission failed.", "status" => "error"];
}
function getAdminTickets($conn)
{
    global $get_admin_tickets;
    $stmt = $conn->prepare($get_admin_tickets);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $tickets = [];
    while ($row = $result->fetch_assoc())
    {
        array_push($tickets, $row);
    }
    return $tickets;
}
function addCompany($data, $conn)
{
    global $add_company;
    $stmt = $conn->prepare($add_company);
    $stmt->bind_param("ss", $data['company_name'], $data['regKey']);
    $stmt->execute();
    if ($stmt->affected_rows > 0)
    {
        return ["message" => "Company added successfully.", "status" => "success", "c_id" => $stmt->insert_id];
    }
    $stmt->close();
    return false;
}
function getHash($id, $conn)
{
    global $get_hash;
    $stmt = $conn->prepare($get_hash);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0)
    {
        return $result->fetch_assoc()['company_password_hash'];
    }
    return false;
}
function getCompany($name, $conn)
{
    global $get_company;
    $stmt = $conn->prepare($get_company);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0)
    {
        return ["status" => "found", "result" => $result->fetch_assoc()];
    }
    return false;
}
function closeAdminTicket($ticket_id, $conn)
{
    global $close_admin_ticket;
    $stmt = $conn->prepare($close_admin_ticket);
    $stmt->bind_param("i", $ticket_id);
    $stmt->execute();
    if ($stmt->affected_rows > 0)
    {
        return true;
    }
    $stmt->close();
    return false;
}
function verifyUser($token, $conn)
{
    global $verify_user;
    $stmt = $conn->prepare($verify_user);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    if ($stmt->affected_rows > 0)
    {
        return true;
    }
    $stmt->close();
    return false;
}
?>