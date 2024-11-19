<?php
include 'Connection/connection.php';

// Check database connection
if (!$conn) {
    echo json_encode(array("status" => "error", "message" => "Unable to connect to the database."));
    exit;
}

// Check if all required POST parameters are set
if (isset($_POST['im_code']) && isset($_POST['item_name']) && isset($_POST['specification']) && 
    isset($_POST['ga_uom']) && isset($_POST['ga_unit_cost']) && isset($_POST['conversion']) && 
    isset($_POST['out_of_inventory']) && isset($_POST['fi_uom']) && isset($_POST['fi_unit_cost']) && 
    isset($_POST['supplier_name']) && isset($_POST['storage_location'])) {

    // Retrieve POST parameters and sanitize them
    $im_code = pg_escape_string($conn, $_POST['im_code']);
    $item_name = pg_escape_string($conn, $_POST['item_name']);
    $specification = pg_escape_string($conn, $_POST['specification']);
    $ga_uom = pg_escape_string($conn, $_POST['ga_uom']);
    $ga_unit_cost = pg_escape_string($conn, $_POST['ga_unit_cost']);
    $conversion = pg_escape_string($conn, $_POST['conversion']);
    $out_of_inventory = pg_escape_string($conn, $_POST['out_of_inventory']);
    $fi_uom = pg_escape_string($conn, $_POST['fi_uom']);
    $fi_unit_cost = pg_escape_string($conn, $_POST['fi_unit_cost']);
    $supplier_name = pg_escape_string($conn, $_POST['supplier_name']);
    $storage_location = pg_escape_string($conn, $_POST['storage_location']);

    // Construct the SQL UPDATE query
    $query = "UPDATE tbl_im_list_ga SET 
                item_name = '$item_name', 
                specification = '$specification', 
                ga_uom = '$ga_uom', 
                ga_unit_cost = '$ga_unit_cost', 
                conversion = '$conversion', 
                out_of_inventory = '$out_of_inventory', 
                fi_uom = '$fi_uom', 
                fi_unit_cost = '$fi_unit_cost', 
                supplier_name = '$supplier_name', 
                storage_location = '$storage_location' 
              WHERE im_code = '$im_code'";

    // Log the SQL query for debugging (optional)
    error_log("SQL Query: " . $query);

    // Execute the query
    $result = pg_query($conn, $query);

    // Check if query executed successfully
    if ($result) {
        echo json_encode(array("status" => "success", "message" => "Item details updated successfully."));
    } else {
        // Handle query execution failure
        echo json_encode(array("status" => "error", "message" => "An error occurred while updating data: " . pg_last_error($conn)));
    }
} else {
    // Handle missing POST parameters
    echo json_encode(array("status" => "error", "message" => "Missing required POST parameters."));
}

// Close the database connection
pg_close($conn);
?>
