<?php 


include 'Connection/connection.php';

header('Content-Type: application/json');

$item_code = $_POST['item_code'] ?? '';
$transaction_number = $_POST['transaction_number'] ?? '';

if (empty($item_code) || empty($transaction_number)) {
    echo json_encode(['error' => 'Item code or transaction number not provided']);
    exit;
}

// Perform database query
$query = "SELECT * FROM tbl_mim_approvaltest WHERE item_code = $1 AND transaction_number = $2";
$result = pg_query_params($conn, $query, array($item_code, $transaction_number));


if ($row = pg_fetch_assoc($result)) {
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'No details found for the selected item.']);
}
?>
