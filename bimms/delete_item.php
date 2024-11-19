<?php 
include 'Connection/connection.php';


// Get the POST data
$data = json_decode(file_get_contents("php://input"), true);
$itemCode = $data['itemCode'];
$transactionNumber = $data['transactionNumber']; // Receive transaction number


if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit;
}

// Prepare the SQL DELETE query
$query = "DELETE FROM tbl_mim_approval WHERE item_code = $1 AND transaction_number = $2";
$result = pg_query_params($conn, $query, array($itemCode, $transactionNumber));


if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete the item.']);
}

// Close the connection
pg_close($conn);
?>
