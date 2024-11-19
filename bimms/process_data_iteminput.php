<?php
include 'Connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['itemIdentification'])) {
    $itemID = $_POST['itemIdentification'];

    $stmt = pg_prepare($conn, "select_query", "SELECT * FROM tbl_mim WHERE item_code = $1");

    if ($stmt) {
        $result = pg_execute($conn, "select_query", array($itemID));

        if ($result) {
            $row = pg_fetch_assoc($result);



            if ($row) {
                $data = array(
        "item_code" => !empty($row['item_code']) ? $row['item_code'] : null,
        "item_name" => !empty($row['item_name']) ? $row['item_name'] : null,
        "specification" => !empty($row['specification']) ? $row['specification'] : null,
        "stock_quantity" => !empty($row['stock']) ? $row['stock'] : null,
        "unit_cost" => !empty($row['unit_cost']) ? $row['unit_cost'] : null,
        "storage_location" => !empty($row['storage_location']) ? $row['storage_location'] : null,
        "remarks" => !empty($row['remarks']) ? $row['remarks'] : null,
        "po_number" => !empty($row['po_number']) ? $row['po_number'] : null,
        "delivery_date" => !empty($row['delivery_date']) ? $row['delivery_date'] : null,
        "supplier" => !empty($row['supplier']) ? $row['supplier'] : null,
        "warehouse" => !empty($row['warehouse']) ? $row['warehouse'] : null,
        "uom" => !empty($row['uom']) ? $row['uom'] : null

                
                  
                 
                );

                echo json_encode($data);
            } else {
                echo json_encode(["error" => "No data found for the given transaction number."]);
            }
        } else {
            echo json_encode(["error" => "An error occurred while fetching data."]);
        }
    } else {
        echo json_encode(["error" => "Error preparing SQL statement."]);
    }

    pg_close($conn);
}
?>
