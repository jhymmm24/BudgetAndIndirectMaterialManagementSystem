<?php
include 'Connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['itemIdentification']) ) {
    $itemID = $_POST['itemIdentification'];


    $stmt = pg_prepare($conn, "select_query", "SELECT * FROM tbl_im_list_ga WHERE im_code = $1");

    if ($stmt) {
        $result = pg_execute($conn, "select_query", array($itemID));

        if ($result) {
            $row = pg_fetch_assoc($result);

            if ($row) {
                $data = array(
                    "im_code" => $row['im_code'],
                    "item_name" => $row['item_name'],
                    "specification" => $row['specification'],
                    "ga_uom" => $row['ga_uom'],
                    "ga_unit_cost" => $row['ga_unit_cost'],
                    "conversion" => $row['conversion'],
                    "out_of_inventory" => $row['out_of_inventory'],
                    "fi_uom" => $row['fi_uom'],
                    "fi_unit_cost" => $row['fi_unit_cost'],
                    "supplier_name" => $row['supplier_name'],
                    "storage_location" => $row['storage_location']

                    
                    
                    
                 
                 
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
