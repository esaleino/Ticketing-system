<?php
include QUERIES_PATH . "db-query-functions.php";
function contactHandling($data, $conn)
{
    if ($data['form_source'] === "company")
    {
        if ($data['c-reason'] === "registration")
        {
            return addCompanyTicket_reg($data, $conn);
        }
        else
        {
            return $data;
        }
    }
    else
    {
        return "Invalid form source.";
    }
}
?>