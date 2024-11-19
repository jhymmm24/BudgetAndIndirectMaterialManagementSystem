<?php 

include 'Connection/connection.php';

header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$item_code = $_POST['item_code'] ?? '';
$transaction_number = $_POST['transaction_number'] ?? '';

if (empty($item_code) || empty($transaction_number)) {
    echo json_encode(['error' => 'Item code or transaction number not provided']);
    exit;
}

// Perform database query to get all rows with the same item_code and transaction_number
$query = " SELECT DISTINCT id,transaction_number,item_code, item_name, specification, uom, unit_cost, currency  FROM tbl_mim_approvaltest WHERE item_code = $1 AND transaction_number = $2";
$result = pg_query_params($conn, $query, array($item_code, $transaction_number));

if (!$result) {
    echo json_encode(['error' => 'Database query failed: ' . pg_last_error($conn)]);
    exit;
}

// Check if rows are returned
if (pg_num_rows($result) == 0) {
    echo json_encode(['error' => 'No details found for the selected item.']);
    exit;
}

// Fetch all relevant rows into the response
$details = [];
while ($row = pg_fetch_assoc($result)) {
    $details[] = $row;
}

$response['allDetails'] = $details;

echo json_encode($response);
?>
