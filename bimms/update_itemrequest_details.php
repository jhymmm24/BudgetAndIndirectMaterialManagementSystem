<?php 

include 'Connection/connection.php';

// Debug output to see incoming POST data
error_log("POST Data: " . print_r($_POST, true));

// Retrieve and sanitize input data
$transaction_number = isset($_POST['transaction_number']) ? pg_escape_string($_POST['transaction_number']) : null;
$item_code = isset($_POST['item_code']) ? pg_escape_string($_POST['item_code']) : null;

// Ensure essential values are provided
if (!$transaction_number || !$item_code) {
    die("Error: Missing transaction_number or item_code.");
}

// Use isset() to check if a field is set and not null, otherwise retain the existing value
$item_name = isset($_POST['item_name']) ? pg_escape_string($_POST['item_name']) : null;
$specification = isset($_POST['specification']) ? pg_escape_string($_POST['specification']) : null;
$uom = isset($_POST['uom']) ? pg_escape_string($_POST['uom']) : null;
$unit_cost = isset($_POST['unit_cost']) ? pg_escape_string($_POST['unit_cost']) : null;
$currency = isset($_POST['currency']) ? pg_escape_string($_POST['currency']) : null;
$total_demand_quantity = isset($_POST['total_demand_quantity']) ? pg_escape_string($_POST['total_demand_quantity']) : null;
$approved_qty = isset($_POST['approved_qty']) ? pg_escape_string($_POST['approved_qty']) : null;
$cost_center = isset($_POST['cost_center']) ? pg_escape_string($_POST['cost_center']) : null;
$stock = isset($_POST['stock']) ? pg_escape_string($_POST['stock']) : null;
$requestor_name = isset($_POST['requestor_name']) ? pg_escape_string($_POST['requestor_name']) : null;
$request_date = isset($_POST['request_date']) ? pg_escape_string($_POST['request_date']) : null;
$request_status = isset($_POST['request_status']) ? pg_escape_string($_POST['request_status']) : null;

// Prepare the SQL statement with conditional updates
$update_fields = [];
if ($item_name !== null) $update_fields[] = "item_name = '$item_name'";
if ($specification !== null) $update_fields[] = "specification = '$specification'";
if ($uom !== null) $update_fields[] = "uom = '$uom'";
if ($unit_cost !== null) $update_fields[] = "unit_cost = '$unit_cost'";
if ($currency !== null) $update_fields[] = "currency = '$currency'";
if ($total_demand_quantity !== null) $update_fields[] = "total_demand_quantity = '$total_demand_quantity'";
if ($approved_qty !== null) $update_fields[] = "approved_qty = '$approved_qty'";
if ($cost_center !== null) $update_fields[] = "cost_center = '$cost_center'";
if ($stock !== null) $update_fields[] = "stock = '$stock'";
if ($requestor_name !== null) $update_fields[] = "requestor_name = '$requestor_name'";
if ($request_date !== null) $update_fields[] = "request_date = '$request_date'";
if ($request_status !== null) $update_fields[] = "request_status = '$request_status'";

// Join the fields to form the SET clause of the SQL query
$set_clause = implode(', ', $update_fields);

// Prepare SQL statement for update
$sql = "UPDATE tbl_mim_itemrequest_approval SET $set_clause WHERE transaction_number = '$transaction_number' AND item_code = '$item_code'";


// Output the query for debugging
error_log("SQL Query: $sql");
// Execute the SQL statement
$result = pg_query($conn, $sql);


if ($result) {
    echo 'Success';
} else {
    error_log('Error: ' . pg_last_error($conn));
    echo 'Error: ' . pg_last_error($conn);
}

// Close the database connection
pg_close($conn);
?>