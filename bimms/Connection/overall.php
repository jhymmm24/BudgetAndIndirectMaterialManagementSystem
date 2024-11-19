<?php

$userid = $_SESSION['BIMMSuser_id'];

// Assuming $conn is your PostgreSQL connection object

$sql = "SELECT * FROM tbl_accounts WHERE adid = $1";
$params = array($userid);
$result = pg_query_params($conn, $sql, $params);

while ($row = pg_fetch_assoc($result)) {
    $empno = $row['employee_number'];
    $fullname = $row['employee_name'];
    $adid = $row['adid'];
    $email = $row['email'];
    $pass = $row['password'];
   
    $section = $row['section'];
    $usercategory = $row['user_category'];

    // Process retrieved data here...
}

?>
