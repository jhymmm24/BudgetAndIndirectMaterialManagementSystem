<?php
include 'Connection/connection.php';

// Fetch the item_code and transaction_number from the GET request
$item_code = isset($_GET['item_code']) ? $_GET['item_code'] : '';
$transaction_number = isset($_GET['transaction_number']) ? $_GET['transaction_number'] : ''; // Get transaction number

// Validate inputs
if (!empty($item_code) && !empty($transaction_number)) {
    // Prepare the query with placeholders
    $query = "SELECT * FROM tbl_mim_approval WHERE item_code = $1 AND transaction_number = $2";
    
    // Execute the query with parameterized values
    $result = pg_query_params($conn, $query, array($item_code, $transaction_number));

    if ($result && $row = pg_fetch_assoc($result)) {
        // Output JSON data if the record is found
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        // Return an error if no record is found
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Item not found']);
    }
} else {
    // Return an error if item_code or transaction_number is not provided
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Item code or transaction number not provided']);
}

// Close the database connection
pg_close($conn);
?>
