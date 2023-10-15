<?php
include __DIR__ . "/db-queries.php";
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
        return true;
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

function registerUser($data, $conn)
{

}

?>