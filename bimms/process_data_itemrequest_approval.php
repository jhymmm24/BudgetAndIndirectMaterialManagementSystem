<?php 
include 'Connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selectedItemId'])) {
        // Get the array of selected item IDs
        $selectedItemIds = explode(',', $_POST['selectedItemId']);
        $requeststatus = "For Item Out";

        // Prepare the SQL statement to select item details based on transaction_number
        $stmt = pg_prepare($conn, "select_query", "SELECT * FROM tbl_mim_itemrequest_approval WHERE transaction_number = $1");

        // Check if the statement preparation was successful
        if (!$stmt) {
            echo "Failed to prepare statement.";
            exit;
        }

        // Prepare the update statement
        $update_stmt = pg_prepare($conn, "update_query", "UPDATE tbl_mim_itemrequest_approval SET request_status = $1, approved_qty = $2 WHERE transaction_number = $3");

        // Check if the statement preparation was successful
        if (!$update_stmt) {
            echo "Failed to prepare update statement.";
            exit;
        }

        // Loop through the array and execute the prepared statement
        foreach ($selectedItemIds as $index => $itemId) {
            // Trim the item ID
            $itemId = trim($itemId);

            // Execute the prepared statement to select item details
            $result = pg_execute($conn, "select_query", array($itemId));

            // Check if the query execution was successful
            if (!$result) {
                echo "Failed to execute select query for item ID: " . htmlspecialchars($itemId) . "<br>";
                continue; // Skip to the next item ID
            }

            // Fetch the item details
            while ($row = pg_fetch_assoc($result)) {
                $transactionNumber = $row['transaction_number'];
                $itemCode = $row['item_code'];
                $itemName = $row['item_name'];
                $itemSpecification = $row['specification'];
                $itemUom = $row['uom'];
                $requestdate = $row['request_date'];
                $itemStock = $row['stock'];
                $itemUnitcost = $row['unit_cost'];
                $itemCurrency = $row['currency'];
                $itemRequestorname = $row['requestor_name'];
                $totaldemandquantity = $row['total_demand_quantity'];
                $totaloverallcost  = $row['overall_total_cost'];
                $costcenter = $row['cost_center'];

                echo "<h3>Item Details for Item ID: " . htmlspecialchars($itemId) . "</h3>";
                echo "Transaction Number: " . htmlspecialchars($row['transaction_number']) . "<br>";
                echo "Request Date: " . htmlspecialchars($row['request_date']) . "<br>";
                echo "Item Code: " . htmlspecialchars($row['item_code']) . "<br>";
                echo "Item Name: " . htmlspecialchars($row['item_name']) . "<br>";
                echo "Specification: " . htmlspecialchars($row['specification']) . "<br>";
                echo "UOM: " . htmlspecialchars($row['uom']) . "<br>";
                echo "Stock: " . htmlspecialchars($row['stock']) . "<br>";
                echo "Unit Cost: " . htmlspecialchars($row['unit_cost']) . "<br>";
                echo "Currency: " . htmlspecialchars($row['currency']) . "<br>";
                echo "Requestor Name: " . htmlspecialchars($row['requestor_name']) . "<br>";
                echo "Cost Center: " . htmlspecialchars($row['cost_center']) . "<br>";

             
                // Process approved quantity for the current item
                $approvedQty = $_POST['approvedqty'][$index] ?? "0"; // Get approvedqty from POST data

                echo "Approved Qty: " . htmlspecialchars($approvedQty) . "<br>";

                echo "<hr>";

                // Execute the prepared statement to update item details
                $update_result = pg_execute($conn, "update_query", array($requeststatus, $approvedQty, $transactionNumber));

                if (!$update_result) {
                    echo "Failed to update item details for item ID: " . htmlspecialchars($itemId) . "<br>";
                } else {
                    echo "Item details updated successfully for item ID: " . htmlspecialchars($itemId) . "<br>";
                }
            }
        }
    } else {
        echo "No item IDs were selected.";
    }
} else {
    echo "Invalid request method.";
}

pg_close($conn);
?>
