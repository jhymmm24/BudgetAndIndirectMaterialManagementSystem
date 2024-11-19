<?php
include 'Connection/connection.php';

// Retrieve adid from POST request
$adid = $_POST['adid'];

// Initialize variable for section
$section = '';

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Query to fetch section from tbl_accounts based on adid
$query_section = "SELECT section FROM tbl_accounts WHERE adid = $1";

// Prepare statement for section query
$stmt_section = pg_prepare($conn, "fetch_section_query", $query_section);

if (!$stmt_section) {
    die("Error preparing section query: " . pg_last_error());
}

// Execute section query with adid parameter
$result_section = pg_execute($conn, "fetch_section_query", array($adid));

if (!$result_section) {
    die("Error executing section query: " . pg_last_error());
}

// Fetch section from result
$row_section = pg_fetch_assoc($result_section);
$section = $row_section['section'];

// Close connection
pg_close($conn);

// Prepare JSON response
$response = array(
    'section' => $section
);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
