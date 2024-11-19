<?php
include 'Connection/connection.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Retrieve form data
$updatedBy = $_POST['updatedby'] ?? '';
$updateddate = date('Y-m-d h:i:s A');
$hiddenItemId = $_POST['hiddenitemid'] ?? '';

$itemcode = $_POST['itemcode'];
$po_number = $_POST['po_number'];
$itemname = $_POST['itemname'];
$stock_quantity = $_POST['stock_quantity'];
$unitcost = $_POST['unit_cost'];
$remarks = $_POST['remarks'];
$supplier = $_POST['supplier'];
$uom = $_POST['uom'];
$specification = $_POST['specification'] ?? '';
$warehouse = $_POST['warehouse'] ?? '';

$process = 'Update';
$currency = 'USD';

// Escape values to prevent SQL injection
$itemcode = pg_escape_string($itemcode);
$po_number = pg_escape_string($po_number);
$itemname = pg_escape_string($itemname);
$stock_quantity = pg_escape_string($stock_quantity);
$unitcost = pg_escape_string($unitcost);
$remarks = pg_escape_string($remarks);
$supplier = pg_escape_string($supplier);
$uom = pg_escape_string($uom);
$specification = pg_escape_string($specification);
$updatedBy = pg_escape_string($updatedBy);
$warehouse = pg_escape_string($warehouse);

// Construct SQL query for updating the main table
$sql = "UPDATE tbl_mim SET 
    po_number = '$po_number', 
    item_name = '$itemname', 
    stock = '$stock_quantity', 
    unit_cost = '$unitcost', 
    remarks = '$remarks',
    updated_by = '$updatedBy',
    updated_date = '$updateddate',
    isupdated = 'YES'
WHERE item_code = '$itemcode'";

// Execute query
$result = pg_query($conn, $sql);

// Check if query executed successfully
if (!$result) {
    echo json_encode(['success' => false, 'error' => pg_last_error($conn)]);
    exit;
}

// Construct SQL query for inserting into the history table
$sql_history = "INSERT INTO tbl_mim_update_history 
(item_code, item_name, specification, supplier, uom, stock, unit_cost, currency, received_date, remarks, pic, po_number, process, warehouse)
VALUES ('$itemcode', '$itemname', '$specification', '$supplier', '$uom', '$stock_quantity', '$unitcost', '$currency', '$updateddate', '$remarks', '$updatedBy', '$po_number', '$process','$warehouse')";

// Debug: Print the SQL query to check for errors
echo "<script>console.log(`$sql_history`);</script>";

// Execute query
$result_history = pg_query($conn, $sql_history);

// Check if query executed successfully
if ($result_history) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => pg_last_error($conn)]);
}

// Close connection
pg_close($conn);
?>
