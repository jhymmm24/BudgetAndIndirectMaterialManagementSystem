<?php
// Include database connection file
include 'Connection/connection.php'; // Ensure this file properly establishes a PostgreSQL connection

header('Content-Type: application/json'); // Set content type to JSON

// Get POST data
$item_code = isset($_POST['item_code']) ? $_POST['item_code'] : '';
$transaction_number = isset($_POST['transaction_number']) ? $_POST['transaction_number'] : '';
$column = isset($_POST['column']) ? $_POST['column'] : '';
$value = isset($_POST['value']) ? $_POST['value'] : '';

// Validate input
if (empty($item_code) || empty($transaction_number) || empty($column) || empty($value)) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

// List of allowed columns to prevent SQL Injection
$allowed_columns = [
    'january', 'february', 'march', 'april', 'may', 'june', 'july',
    'august', 'september', 'october', 'november', 'december'
];

// Check if the column is allowed
if (!in_array($column, $allowed_columns)) {
    echo json_encode(['error' => 'Invalid column']);
    exit;
}

// Sanitize input
$item_code = pg_escape_string($conn, $item_code);
$transaction_number = pg_escape_string($conn, $transaction_number);
$column = pg_escape_string($conn, $column);
$value = pg_escape_string($conn, $value);

// Construct the query
$query = "UPDATE tbl_mim_approval SET $column = '$value' WHERE item_code = '$item_code' AND transaction_number = '$transaction_number'";

// Log the query for debugging
file_put_contents('debug.log', "Executing query: $query\n", FILE_APPEND);

$result = pg_query($conn, $query);

if (!$result) {
    echo json_encode(['error' => 'Database error: ' . pg_last_error($conn)]);
} else {
    $affected_rows = pg_affected_rows($result);
    if ($affected_rows > 0) {
        echo json_encode(['success' => 'Item detail updated successfully']);
    } else {
        echo json_encode(['error' => 'No rows updated, check if the item_code and transaction_number are correct']);
    }
}

// Close the connection
pg_close($conn);
?>
