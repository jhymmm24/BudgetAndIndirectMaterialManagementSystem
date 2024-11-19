<?php
include 'Connection/connection.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs (basic sanitization)
    $oscode = $_POST['oscode'];
    $itemcode = $_POST['itemcode'];
    $itemname = $_POST['itemname'];
    $specification = $_POST['specification'];
    $peuom = $_POST['peuom'];
    $peunitcost = $_POST['peunitcost'];
    $conversion_data = $_POST['conversion_data'];
    $inventoryout = $_POST['inventoryout'];
    $fiuom = $_POST['fiuom'];
    $fiunitprice = $_POST['fiunitprice'];

    // Prepare SQL statement
    $update_query = "UPDATE tbl_im_list_ga SET os_code = $1, item_name = $2, specification = $3, ga_uom = $4, ga_unit_cost = $5, conversion = $6, out_of_inventory = $7, fi_uom = $8, fi_unit_cost = $9 WHERE im_code = $10";

    // Execute the query with parameters
    $update_result = pg_query_params($conn, $update_query, array($oscode, $itemname, $specification, $peuom, $peunitcost, $conversion_data, $inventoryout, $fiuom, $fiunitprice, $itemcode));

    if ($update_result) {
        echo "success";
    } else {
        echo "Failed to update database.";
    }
} else {
    echo "Invalid form submission.";
}
?>
