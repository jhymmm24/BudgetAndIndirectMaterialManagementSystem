<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'Connection/connection.php';

if (!$conn) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}
// Set header to JSON
header('Content-Type: application/json');

// Get the raw POST data
$inputData = file_get_contents('php://input');
$data = json_decode($inputData, true);


if ($data === null) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

pg_query($conn, "BEGIN");

try {
    foreach ($data as $item) {
        $item_code = pg_escape_string($conn, $item['item_code']);
        $transaction_number = pg_escape_string($conn, $item['transaction_number']);
        $value = pg_escape_string($conn, $item['value']);
        
        $query = "UPDATE tbl_mim_itemrequest_approval 
                  SET issued_qty = '$value' , 
                  request_status = 'DONE'
                  WHERE item_code = '$item_code' 
                  AND transaction_number = '$transaction_number'";

        $result = pg_query($conn, $query);
     
        if (!$result) {
            throw new Exception('Update failed: ' . pg_last_error($conn));
        }
    }

    pg_query($conn, "COMMIT");
    echo json_encode(['message' => 'Update successful']);
} catch (Exception $e) {
    pg_query($conn, "ROLLBACK");
    echo json_encode(['error' => 'Update failed: ' . $e->getMessage()]);
}

// Close the database connection
pg_close($conn);
?>
