<?php
include QUERIES_PATH . "db-query-functions.php";
include QUERIES_PATH . "db-connect.php";
$conn = DbConnect::createConnection();
$adminTickets = getAdminTickets($conn);
$conn->close();
$companyRegTickets = companyTickets_reg($adminTickets);


// Functions
function companyTickets_reg($data)
{
    foreach ($data as $ticket)
    {
        if ($ticket['contact_reason'] === "registration" && $ticket['state'] === "open")
        {
            $res[] = $ticket;
        }
    }
    return $res;
}

// Load data to js
echo '<script>var companyRegTickets = ' . json_encode($companyRegTickets) . ';</script>';
?>