<?php
include 'Connection/connection.php';

// Assuming you have established your database connection ($conn) and processed other PHP logic before this

// Get the selected item ID from POST data
if(isset($_POST['selectedItemId'])) {
    $selectedItemId = $_POST['selectedItemId'];

    // Check if the connection is successful
    if (!$conn) {
        echo "Failed to connect to PostgreSQL.";
        exit;
    }

    // Prepare the SQL statement to delete the item
    $delete_stmt = pg_prepare($conn, "delete_query", "DELETE FROM tbl_mim_cart WHERE item_code = $1");

    // Check if the statement preparation was successful
    if (!$delete_stmt) {
        echo "Failed to prepare delete statement.";
        exit;
    }

    // Execute the prepared statement to delete the item
    $delete_result = pg_execute($conn, "delete_query", array($selectedItemId));

    // Check if the execution was successful
    if (!$delete_result) {
        echo "Failed to delete item with item code: " . $selectedItemId . "<br>";
    } else {
        echo "Item with item code " . $selectedItemId . " has been successfully removed.";
    }
} else {
    echo "No item ID received.";
}
?>
