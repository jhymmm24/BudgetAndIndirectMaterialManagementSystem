<?php
include 'Connection/connection.php';

// Read the raw POST data
$rawData = file_get_contents('php://input');
error_log("Raw POST Data: " . $rawData); // Log the raw data

// Decode the JSON into an associative array
$data = json_decode($rawData, true);
error_log("Decoded Data: " . print_r($data, true)); // Log the decoded data

// Retrieve the transaction number from the decoded JSON
$transaction_number = isset($data['transaction_number']) ? pg_escape_string($data['transaction_number']) : null;

if (!$transaction_number) {
    die(json_encode(['success' => false, 'error' => 'Transaction number is missing.']));
}

// Retrieve the target data array from decoded JSON
$target_data = isset($data['target_data']) ? $data['target_data'] : [];

// Ensure target_data is available and not empty
if (empty($target_data)) {
    die(json_encode(['success' => false, 'error' => 'No target data received.']));
}

// Loop through the target data and construct the update query
foreach ($target_data as $row) {
    $target_month = isset($row['target_month']) ? pg_escape_string($row['target_month']) : null;
    $target_qty = isset($row['target_qty']) ? (int)$row['target_qty'] : 0;

    if (!$target_month) {
        error_log("Skipping invalid row with missing month data.");
        continue;
    }

    $sql = "UPDATE tbl_mim_approvaltest 
    SET target_qty = $target_qty 
    WHERE transaction_number = '$transaction_number' 
      AND target_month = '$target_month'";

    error_log("SQL Query: $sql");

    $result = pg_query($conn, $sql);
    if (!$result) {
        error_log('Error updating month ' . $target_month . ': ' . pg_last_error($conn));
    }
}

pg_close($conn);
echo json_encode(['success' => true]);
?>
