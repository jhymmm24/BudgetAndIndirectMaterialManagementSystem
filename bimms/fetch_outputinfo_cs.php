<?php
include 'Connection/connection.php';

// Retrieve section from POST request
$section = $_POST['section'];

// Initialize array for cost_centers
$cost_centers = [];

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Query to fetch cost_center and cost_center_name from tbl_costcenter based on section
$query_cost_center = "SELECT cost_center, costcenter_name FROM tbl_costcenter WHERE section = $1";

// Prepare statement for cost_center query
$stmt_cost_center = pg_prepare($conn, "fetch_cost_center_query", $query_cost_center);

if (!$stmt_cost_center) {
    die("Error preparing cost_center query: " . pg_last_error());
}

// Execute cost_center query with section parameter
$result_cost_center = pg_execute($conn, "fetch_cost_center_query", array($section));

if (!$result_cost_center) {
    die("Error executing cost_center query: " . pg_last_error());
}

// Fetch cost_centers from result
while ($row_cost_center = pg_fetch_assoc($result_cost_center)) {
    $cost_centers[] = array(
        'cost_center' => $row_cost_center['cost_center'],
        'costcenter_name' => $row_cost_center['costcenter_name']
    );
}

// Close connection
pg_close($conn);

// Prepare JSON response
$response = array(
    'cost_centers' => $cost_centers
);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
