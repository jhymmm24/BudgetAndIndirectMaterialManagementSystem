<?php 

include 'Connection/connection.php';

header('Content-Type: application/json');

// Retrieve posted data
$item_code = $_POST['item_code'];
$transaction_number = $_POST['transaction_number'];

// Prepare your SQL query
$query = "SELECT id,target_month, target_qty FROM tbl_mim_approvaltest WHERE item_code = $1 AND transaction_number = $2 ORDER BY id ASC";
$result = pg_query_params($conn, $query, array($item_code, $transaction_number));

// Check for errors in query execution
if (!$result) {
    echo json_encode(['error' => 'Query failed: ' . pg_last_error($conn)]);
    exit;
}

// Fetch the results into an array
$targetData = [];
while ($row = pg_fetch_assoc($result)) {
    $targetData[] = $row;
}

// Return the data as JSON
echo json_encode($targetData);

// Close the database connection if needed
pg_close($conn);
?>
