<?php
include 'Connection/connection.php';

if (isset($_POST['searchQuery'])) {
    $searchQuery = $_POST['searchQuery'];
// Search query
$query = "SELECT * FROM tbl_mim_itemrequest_approval WHERE transaction_number = $1 and request_status = 'For Item Out' ";
$result = pg_query_params($conn, $query, array($searchQuery));

if ($result) {
    $rows = pg_fetch_all($result);
    if ($rows) {
        // Return the result as JSON if transaction exists
        echo json_encode($rows);
    } else {
        // If no transaction number found, return an error response
        echo json_encode(['status' => 'not_found']);
    }
} else {
    // Query failed
    echo json_encode(['status' => 'error', 'message' => 'Query failed']);
}

// Close connection
pg_close($conn);
}
?>